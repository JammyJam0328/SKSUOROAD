<?php

namespace App\Http\Livewire\Registrar\Component;

use Livewire\Component;

class NotificationPanel extends Component
{
     public function getListeners()

    {

        return [
            "echo-private:new-notification.".auth()->user()->id.",NotificationEvent" => '$refresh',
        ];

    }

    public function render()
    {
        return view('livewire.registrar.component.notification-panel',[
            'notifications'=> auth()->user()->notifications,
        ]);
    }
}
