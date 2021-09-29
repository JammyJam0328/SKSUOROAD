<?php

namespace App\Http\Livewire\Registrar\Component;

use Livewire\Component;
use App\Models\Request;
use App\Models\Notification;

class NotificationContainer extends Component
{
    public $request_id;
    public $context;
    public $time;
    public $notif_id;



    public function render()
    {
        return view('livewire.registrar.component.notification-container');
    }
    public function mount($id,$context,$time,$notif)
    {
        $this->request_id=$id;
        $this->context = $context;
        $this->time = $time;
        $this->notif_id = $notif;

    }

    public function gotoRequest()
    {
        $notification=auth()->user()->notifications()->where('id',$this->notif_id)->first();

        $notification->update([
            'read_at'=>now()
        ]);

        $request = Request::where('id',$this->request_id)->first();


        switch ($request->status) {
            case 'Pending':
                return redirect()->route('req-pending',['id'=>$request->id]);
                break;

                case 'Approved':
                return redirect()->route('req-approved',['id'=>$request->id]);
                break;
               
                case 'Payment Review':
                return redirect()->route('req-review',['id'=>$request->id]);
                break;

                case 'Ready To Claim':
                return redirect()->route('req-ready',['id'=>$request->id]);
                break;

                case 'Claimed':
                return redirect()->route('req-claimed',['id'=>$request->id]);
                break;

                case 'Denied':
                return redirect()->route('req-denied',['id'=>$request->id]);
                break;

                case 'To Cleared':
                    return redirect()->route('req-toclear',['id'=>$request->id]);
                break;
        }
    }
}
