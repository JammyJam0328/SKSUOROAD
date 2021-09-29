<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\Request;
use App\Models\User;

use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationEvent;

class Finalize extends Component
{
    public $request;

    public function render()
    {
        return view('livewire.requestor.finalize',[
            'request_documents'=>$this->request->documents()->get(),
        ]);
    }

    public function mount($id)
    {
        $this->request=Request::where('id',$id)->first();
    }

    public function checkAuth($id)
    {
        $requestedDocument = $this->request->documents()->whereDocumentId($id)->first();
        $requestedDocument->pivot->update([
            'withAuth'=>"yes",
        ]);
    }
    public function uncheckAuth($id)
    {
        $requestedDocument = $this->request->documents()->whereDocumentId($id)->first();
        $requestedDocument->pivot->update([
            'withAuth'=>"no",
        ]);
    }
    public function addCopies($id)
    {
        $requestedDocument = $this->request->documents()->whereDocumentId($id)->first();
        $copies = $requestedDocument->pivot->copies + 1;
        $requestedDocument->pivot->update([
            'copies'=>$copies, 
        ]);
    }
    public function minusCopies($id)
    {
        $requestedDocument = $this->request->documents()->whereDocumentId($id)->first();
        $copies = $requestedDocument->pivot->copies -1;
        $requestedDocument->pivot->update([
            'copies'=>$copies,
        ]);
    }

    public function finalize()
    {
        auth()->user()->information->status == "Graduated"
            ? $status = "To Cleared" 
            : $status = "Pending";
            
        $this->request->update([
            'status'=>$status,
        ]);


        $user = User::where('campus_id',$this->request->campus_id)->first();
        $notificationMsg = "You receive a new request - [Request code : ".$this->request->request_code."]";
        $user->notify(new RequestNotification($notificationMsg,$this->request->id,$this->request->request_code));
        event(new NotificationEvent($user->id));

        return redirect()->route('dashboard');
    }
}