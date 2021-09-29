<?php

namespace App\Http\Livewire\Requestor\Component;

use Livewire\Component;
use App\Models\Request;
class Payment extends Component
{
    public $request_id;
    public function render()
    {
        return view('livewire.requestor.component.payment',[
            'request'=>Request::where()
        ]);
    }
    public function mount($id)
    {
        $this->request_id=$id;
    }
}
