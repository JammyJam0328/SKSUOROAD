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
class ReadyToClaim extends Component
{
    use WithPagination;
    public $optParam;


      public function mount($id)
    {
        $id ? $this->optParam = $id : '';
    }
    public function render()
    {
        return view('livewire.registrar.request.ready-to-claim',[
            'readys'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','Ready To Claim')->where('id','like','%'.$this->optParam.'%')->orderBy('created_at','DESC')->paginate(20),
        ]);
    }
    public function markAsClaimed($id,$code)
    {
        $data = Request::where('id',$id)->where('request_code',$code)->first();
        if ($data) {
            $data->update([
                'status'=>"Claimed",
            ]);
            $this->alert('success',"Request marked as claimed");
        }
    }
}
