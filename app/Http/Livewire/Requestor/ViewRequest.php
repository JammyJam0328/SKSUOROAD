<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\Request;
use App\Models\Proofofpayment;
use App\Models\User;
use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationEvent;
use Livewire\WithFileUploads;
class ViewRequest extends Component
{
     use WithFileUploads;
    public $request_id;
    public $code;
    public $details;
    public $toPay;

    public $images = [];

    public $toSave = [];
    public $tempPath = [];

    public function render()
    {
         $this->details=Request::where('id',$this->request_id)->where('request_code',$this->code)->first();
          $this->toPay = $this->details->transaction ?$this->details->transaction->documents_amount + $this->details->transaction->documentary_stamp + $this->details->transaction->additional_charge : 0;
        return view('livewire.requestor.view-request');
    }

    public function mount($id,$code)
    {
       $this->request_id = $id;
       $this->code = $code;

    }

    public function removeImage($key)
    {
         array_splice($this->images,$key,1);
    }


    public function discardImages()
    {

    }

    public function saveproof()
    {
         foreach ($this->images as $image) {
               $uploadedImg = \Illuminate\Support\Facades\Storage::disk('google')->getAdapter()->write(config('gdrivefolders.Payments').'/' . $image->getClientOriginalName(), $image->readStream(), new \League\Flysystem\Config([]));
               $this->tempPath[] = explode("/", $uploadedImg['path']);
         }

         foreach ($this->tempPath as $path) {
               $this->toSave[] = $path[1];
         }
        

         foreach ($this->toSave as $file){
               Proofofpayment::create([
                    'transaction_id'=>$this->details->transaction->id,
                    'image'=>$file,
               ]);
         }
         $this->details->update([
              'status'=>'Payment Review',
         ]);

        $user = User::where('campus_id',$this->details->campus_id)->first();
        $notificationMsg =  auth()->user()->information->firstname.' '. auth()->user()->information->middlename.'  '.auth()->user()->information->lastname. " sends a proof of payment for Request code : ".$this->details->request_code."";
        $user->notify(new RequestNotification($notificationMsg,$this->details->id,$this->details->request_code));
        event(new NotificationEvent($user->id));

         return redirect()->route('dashboard');
    }

}
