<?php

namespace App\Http\Livewire\Registrar\Request;

use Livewire\Component;
use App\Models\Request;
use App\Models\Response;
use App\Models\User;

use Livewire\WithPagination;
use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationEvent;
class Approved extends Component
{
     use WithPagination;
        public $modal=false;
        public $details;
    public $optParam;

      public function mount($id)
    {
        $id ? $this->optParam = $id : '';
    }
    public function render()
    {
        return view('livewire.registrar.request.approved',[
            'approved'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','Approved')->where('id','like','%'.$this->optParam.'%')->orderBy('created_at','DESC')->paginate(20),
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
}
