<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\Request;
class Dashboard extends Component
{
    protected $listeners=['newNotification'=>'$refresh'];
    public function render()
    {
        return view('livewire.requestor.dashboard',[
            'requests'=>Request::where('user_id',auth()->user()->id)->where('status','!=','draft')->orderBy('created_at','DESC')->get(),
            'drafts'=>Request::where('user_id',auth()->user()->id)->where('status','draft')->orderBy('created_at','DESC')->get(),
        ]);
    }
}