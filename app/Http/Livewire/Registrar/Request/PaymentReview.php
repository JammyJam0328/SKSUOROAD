<?php

namespace App\Http\Livewire\Registrar\Request;

use Livewire\Component;
use App\Models\Request;
use App\Models\Response;

use Livewire\WithPagination;

use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationEvent;
class PaymentReview extends Component
{
    use WithPagination;
    public $modal=false;
    public $detail;

    public $date;
    public $response;
    public $total;

    public $optParam;
    public function mount($id)
    {
        $id ? $this->optParam = $id : '';
    }

 
     public function getListeners()
    {

        return [
            'viewPanelClose'=>"closeModal"
        ];

    }

    public function render()
    {
        return view('livewire.registrar.request.payment-review',[
            'toreviews'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','Payment Review')->where('id','like','%'.$this->optParam.'%')->orderBy('created_at','DESC')->paginate(20),
        ]);
    }

     public function viewRequest($id)
    {
        $this->details = Request::where('id',$id)->first();
        $this->total = $this->details->transaction->documents_amount + $this->details->transaction->documentary_stamp + $this->details->transaction->additional_charge ;
        $this->modal=true;
    }
    public function closeModal()
    {
        $this->modal=false;
    }

    public function approvedPayment()
    {
        $todayDate = date('Y-m-d');
        $this->validate([
            'date'=>'required|date_format:Y-m-d|after_or_equal:'.$todayDate,
        ]);
     
        $this->details->update([
            'status'=>'Ready To Claim'
        ]);

        $this->details->transaction->update([
            'retrieval_date'=>$this->date,
        ]);

       if ($this->response) {
           Response::create([
            'request_id'=>$this->details->id,
            'message'=>$this->response,
            ]);
       }

        $user = $this->details->user;
        $notificationMsg = "Your Payment has been Approved , Approved documents is now ready to claim - [Request code : ".$this->details->request_code."]";
            
        $user->notify(new RequestNotification($notificationMsg,$this->details->id,$this->details->request_code));
        event(new NotificationEvent($this->details->user_id));

        $this->dispatchBrowserEvent('close-modal');

    }
    public function denyPayment()
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

       

        $user = $this->details->user;
        $notificationMsg = "Your Payment has been Denied - [Request code : ".$this->details->request_code."]";
            
        $user->notify(new RequestNotification($notificationMsg,$this->details->id,$this->details->request_code));
        event(new NotificationEvent($this->details->user_id));

        $this->dispatchBrowserEvent('close-modal');

    }

}
