<?php

namespace App\Http\Livewire\Requestor\Component;

use Livewire\Component;
class Notification extends Component
{
    public $ready=false;
    public $unread;

    public function getListeners()

    {

        return [
            "echo-private:new-notification.".auth()->user()->id.",NotificationEvent" => 'notify',
        ];

    }

    public function notify()
    {
        $this->emit('newNotification');
    }
 
    public function render()
    {
        $this->unread =  auth()->user()->unreadNotifications->count();
        return view('livewire.requestor.component.notification',[
            'notifications'=> $this->ready ? auth()->user()->notifications : [],
           
        ]);
    }
    public function loadNotif()
    {
        $this->ready=true;
    }
    public function markRead()
    {
        if ($this->unread>0) {
            auth()->user()->unreadNotifications->markAsRead();
        }
        $this->dispatchBrowserEvent('close-notif');
    }
}
