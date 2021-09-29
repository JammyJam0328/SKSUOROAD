<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;
use App\Models\Request;
class Dashboard extends Component
{
    public function render()
    {
        $requests=Request::where('campus_id',auth()->user()->campus_id)->get();
        return view('livewire.registrar.dashboard',[
            'all'=>$requests->count(),
            'pending'=>$requests->where('status','Pending')->count(),
            'review'=>$requests->where('status','Payment Review')->count(),
            'claimed'=>$requests->where('status','Claimed')->count(),
            'ready'=>$requests->where('status','Ready To Claim')->count(),
            'toclear'=>$requests->where('status','To Cleared')->count(),
            'denied'=>$requests->where('status','Denied')->count(),


        ]);
    }
}
