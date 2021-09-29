<?php

namespace App\Http\Livewire\Registrar\Component;

use Livewire\Component;
use App\Models\Request;
use App\Models\Transaction;
use App\Models\Response;

use App\Notifications\RequestNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\NotificationEvent;

class PendingProcess extends Component
{
    public $request;
    public $page_count;
    public $request_id;
    public $subtotal;

    public $documentary_stamp;
    public $additional_charges;
    public $response;


    public function render()
    {
        $this->request = Request::where('id',$this->request_id)->first();

        
        $this->subtotal= $this->request->documents()->where('docx_status','approved')->sum('total_amount');
        return view('livewire.registrar.component.pending-process');
    }
    public function mount($id)
    {
        $this->request_id=$id;
    }

      public function savePageNumber($id)
    {
        $this->validate([
            'page_count'=>'required|numeric|gt:0',
        ]);
        // $this=Request::where('id',$this->request->id)->first();
        $document=$this->request->documents()->whereDocumentId($id)->first();

        if ($document->pivot->withAuth=="yes") {
            $authAmount = 15;
        }else{
            $authAmount = 0;
        }

        if($this->page_count>1){
            $temp = $this->page_count-1;
            $sum=$document->price*$temp;
            $total=$sum+75+$authAmount;
        }else{
            $total=75+$authAmount;
        }
        $document->pivot->update([
            'number_of_pages'=>$this->page_count,
            'total_amount'=>$total*$document->pivot->copies,
        ]);
        $this->page_count="";
    }  

    public function approveDocument($id)
    {
        // $this=Request::where('id',$this->request->id)->first();
        $document=$this->request->documents()->whereDocumentId($id)->first();

        if ($document->pivot->withAuth=="yes") {
            $authAmount = 15;
        }else{
            $authAmount = 0;
        }
        $totalAmount = $document->price+$authAmount;
        $document->pivot->update([
            'total_amount'=>$document->pivot->copies*$totalAmount,
            'docx_status'=>"approved"
        ]);
    }

    public function denyDocument($id)
    {
        // $this=Request::where('id',$this->request->id)->first();
        $document=$this->request->documents()->whereDocumentId($id)->first();
        $document->pivot->update([
            'docx_status'=>"denied"
        ]);
    }

    public function approveDocumentTORG($id)
    {

        // $this=Request::where('id',$this->request->id)->first();
        $document=$this->request->documents()->whereDocumentId($id)->first();
        
        if (!$document->pivot->total_amount=="0") {
            $document->pivot->update([
                'docx_status'=>"approved"
            ]);
        }else{
            $this->alert('error','The number of pages must not be 0');
        }
    }

    public function editStatus($id)
    {
        // $this=Request::where('id',$this->request->id)->first();
        $document=$this->request->documents()->whereDocumentId($id)->first();

        if ($id=="5") {
            $document->pivot->update([
                'number_of_pages'=>"0",
                'total_amount'=>"0",
                'docx_status'=>"pending"
            ]);
        }else{ 
            $document->pivot->update([
                'total_amount'=>"0",
                'docx_status'=>"pending"
            ]);
        }
        
    }

    public function processing()
    {
        $this->request->update([
            'status'=>'Processing'
        ]);
    }
         
    public function approvedRequest()
    {
        $this->validate([
            'documentary_stamp'=>'nullable|gt:0|numeric',
            'additional_charges'=>'nullable|gt:0|numeric',
            'response'=>'nullable|max:100',

        ]);

       
        $check = $this->request->documents()->where('request_documents.docx_status','pending')->count();

        if ($check=="0") {
           
            $this->request->update([
                'status'=>'Approved'
            ]);

            Transaction::create([
                'request_id'=>$this->request->id,
                'documents_amount'=>$this->subtotal,
                'documentary_stamp'=>$this->documentary_stamp,
                'additional_charge'=>$this->additional_charges,
            ]);

          if ($this->response) {
               Response::create([
                'request_id'=>$this->request->id,
                'message'=>$this->response,
            ]);

          }
            $user = $this->request->user;
            $notificationMsg = "Your Request has been Approved - [Request code : ".$this->request->request_code."]";
            
            $user->notify(new RequestNotification($notificationMsg,$this->request->id,$this->request->request_code));
            event(new NotificationEvent($this->request->user_id));

            $this->emit('viewPanelClose');

        }else{
            $this->alert('warning','Please Approve or Deny the all documents');

        }
        
       
    }

    public function denyRequest()
    {
        $this->request->update([
            'status'=>'Denied'
        ]);     

        
        if ($this->response) {
           Response::create([
            'request_id'=>$this->details->id,
            'message'=>$this->response,
            ]);
       }

        
        foreach ($this->request->documents as $todenydocument) {
            $todenydocument->pivot->update([
                'docx_status'=>"denied"
            ]);
        }
        $user = $this->request->user;
        $notificationMsg = "You Request has been Denied - [Request code : ".$this->request->request_code."]";
        
        $user->notify(new RequestNotification($notificationMsg,$this->request->id,$this->request->request_code));
         event(new NotificationEvent($this->request->user_id));

        $this->emit('viewPanelClose');
        $this->dispatchBrowserEvent('close-deny-modal');
    }
 
}
