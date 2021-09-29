<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\Document;
use App\Models\Campus;
use App\Models\Purpose;
use App\Models\Request;

use Illuminate\Support\Str;

class CreateRequest extends Component
{
    public $docx_lists=[];
    public $document=[];
    public $purposes = [];
    public $others = false;

    public $purpose;
    public $receiver_name;
    public $other_purpose;

    public $campusReciever;

    public function render()
    {
        $campus = Campus::where('id',auth()->user()->information->course->campus->id)->first();
        $this->docx_lists = $campus->documents()->where('campus_documents.status','Available')->get();
        return view('livewire.requestor.create-request');
    }
    public function mount()
    {
        $this->purposes = Purpose::get();
    }
    public function updatedPurpose()
    {
        if($this->purpose == "7"){
            $this->others = true;
        }else{
            $this->others = false;

        }
    }

    public function createRequest()
    {
        if ($this->others == true) {
             $this->validate([
                'document'=>'required',
                'receiver_name'=>'required',
                'purpose'=>'required',
                'other_purpose'=>'required',
            ]);
         

            $documentsOfRequest=Request::create([
                'user_id'=>auth()->user()->id,
                'receiver_name'=>$this->receiver_name,
                'purpose_id'=>$this->purpose,
                'campus_id'=>auth()->user()->information->course->campus_id,
                'other_purpose'=>$this->other_purpose,
                'request_code'=>'SKSU-'.Str::random(4),
            ]);

            $request=Request::where('id',$documentsOfRequest->id)->first();
            $request->documents()->attach($this->document);
            return redirect()->route('finalize',['id'=>$request->id]);

        }else{
            $this->validate([
                'document'=>'required',
                'receiver_name'=>'required',
                'purpose'=>'required',
                'other_purpose'=>'nullable',
            ]);

            $documentsOfRequest=Request::create([
                'user_id'=>auth()->user()->id,
                'receiver_name'=>$this->receiver_name,
                'purpose_id'=>$this->purpose,
                'campus_id'=>auth()->user()->information->course->campus_id,
                'request_code'=>'SKSU-'.Str::random(4),
            ]);
            $request=Request::where('id',$documentsOfRequest->id)->first();
            $request->documents()->attach($this->document);
            return redirect()->route('finalize',['id'=>$request->id]);
        }
    }
}