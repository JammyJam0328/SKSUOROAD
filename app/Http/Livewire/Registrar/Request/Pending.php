<?php

namespace App\Http\Livewire\Registrar\Request;

use Livewire\Component;
use App\Models\Request;
use Livewire\WithPagination;
class Pending extends Component
{
    use WithPagination;
    public $modal=false;
    public $detail;

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
        return view('livewire.registrar.request.pending',[
            'pendings'=>Request::where('campus_id',auth()->user()->campus_id)->where('status','Pending')->where('id','like','%'.$this->optParam.'%')->orderBy('created_at','DESC')->with('user')->paginate(20),
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