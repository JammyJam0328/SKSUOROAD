<?php

namespace App\Http\Livewire\Registrar\Request;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Request;
use App\Models\Response;
use App\Models\User;


use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationEvent;
class ToCleared extends Component
{
    use WithPagination;
    public $modal=false;
    public $detail;

    public $response;
    public $optParam;

      public function mount($id)
    {
        $id ? $this->optParam = $id : '';
    }
    public function render()
    {
        return view('livewire.registrar.request.to-cleared',[
            'tocleared'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','To Cleared')->where('id','like','%'.$this->optParam.'%')->orderBy('created_at','DESC')->paginate(20),
        ]);
    }
    public function viewRequest($id)
    {
        $this->details = Request::where('id',$id)->first();
        $this->modal=true;
    }
    public function closeModal()
    {
        $this->modal=false;
    }

    public function cleared()
    {
      
        $this->details->update([
            'campus_id'=>"1",
            'status'=>'Pending'
        ]);

     
        if ($this->response) {
           Response::create([
            'request_id'=>$this->details->id,
            'message'=>$this->response,
            ]);
        }

        $user = $this->details->user;
        $notificationMsg = "Your clearance is cleared. Your request will be process to Access Campus - [Request code : ".$this->details->request_code."]";
            
        $user->notify(new RequestNotification($notificationMsg,$this->details->id,$this->details->request_code));
        event(new NotificationEvent($this->details->user_id));

        $access = User::where('campus_id','1')->first();
        $notificationMsg = "You received a new request  - [Request code : ".$this->details->request_code."]";    
        $access->notify(new RequestNotification($notificationMsg,$this->details->id,$this->details->request_code));
        $this->dispatchBrowserEvent('close-modal');

    }

    
    public function denyClearance()
    {
      
         $this->details->update([
            'status'=>'Denied'
        ]);     

        
        if ($this->response) {
           Response::create([
            'request_id'=>$this->details->id,
            'message'=>$this->response,
            ]);
        }

        
        foreach ($this->details->documents as $todenydocument) {
            $todenydocument->pivot->update([
                'docx_status'=>"denied"
            ]);
        }

        $user = $this->details->user;
        $notificationMsg = "You clearance has been Denied - [Request code : ".$this->details->request_code."]";
        $user->notify(new RequestNotification($notificationMsg,$this->details->id,$this->details->request_code));
         event(new NotificationEvent($this->details->user_id));

      

        $this->dispatchBrowserEvent('close-modal');

    }

    
}
