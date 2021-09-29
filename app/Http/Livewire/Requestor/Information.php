<?php

namespace App\Http\Livewire\Requestor;

use Livewire\Component;
use App\Models\Information as UserInfo;
use App\Models\Course;
use App\Models\Campus;
use Livewire\WithFileUploads;

class Information extends Component
{
    use WithFileUploads;
    public $campuses=[];
    public $courses=[];

    // data 
    public $student_number;

    public $firstname;
    public $middlename;
    public $lastname;
    public $sex;
    public $contact_number;
    public $campus='';
    public $course;
    public $address;
    public $valid_id;
    public $status;

    public $sexes = ['Male','Female'];
    public $status_lists = ['Ongoing','Graduated','Not Graduated'];


    public function render()
    {
        return view('livewire.requestor.information');
    }

    public function mount()
    {
        $this->campuses=Campus::get();
    }

    public function updatedCampus()
    {
        $this->courses=Course::where('campus_id',$this->campus)->get();
    }

    public function saveInfo()
    {
        $this->validate([
            'firstname'=>'required|regex:/^[a-zA-Z\s]+$/',
            'middlename'=>'nullable|regex:/^[a-zA-Z\s]+$/',
            'lastname'=>'required|regex:/^[a-zA-Z\s]+$/',
            'sex'=>'required',
            'address'=>'required',
            'campus'=>'required',
            'contact_number'=>'required|digits:11|numeric',
            'student_number'=>'nullable|numeric',
            'course'=>'required',
            'valid_id'=>'required|image|max:2048',
            'status'=>'required'
        ]);
        $uploaded = \Illuminate\Support\Facades\Storage::disk('google')->getAdapter()->write(config('gdrivefolders.ID').'/' . $this->valid_id->getClientOriginalName(), $this->valid_id->readStream(), new \League\Flysystem\Config([]));
        $tempValid_id = explode("/", $uploaded['path']);
        UserInfo::create([
            'studentnumber'=>$this->student_number,
            'user_id'=>auth()->user()->id,
            'firstname'=>$this->firstname,
            'middlename'=>$this->middlename,
            'lastname'=>$this->lastname,
            'sex'=>$this->sex,
            'address'=>$this->address,
            'course_id'=>$this->course,
            'contactnumber'=>$this->contact_number,
            'status'=>$this->status,
            'valid_id'=>$tempValid_id[1],
        ]);
        
        $currentUser = auth()->user();
        $currentUser->update([
            'hasInfo'=>true
        ]);
        return redirect()->route('dashboard');
    }

     public function check(){
       foreach ($this->attachments as $attachment) {
            $uploaded = \Illuminate\Support\Facades\Storage::disk('google')->getAdapter()->write(auth()->user()->folder_id.'/' . $attachment->getClientOriginalName(), $attachment->readStream(), new \League\Flysystem\Config([]));
            
            $this->tempPath[] = explode("/", $uploaded['path']);
           
        
        }
         foreach ($this->tempPath as $path) {
            $this->files[]=$path[1];
         }
        foreach ($this->files as $file) {
            postmodel::create([
                'path' => $file,
                'user_id' => auth()->user()->id,
            ]);
        }
    }

}