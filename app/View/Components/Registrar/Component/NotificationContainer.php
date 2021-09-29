<?php

namespace App\View\Components\Registrar\Component;

use Illuminate\View\Component;
use App\Models\Request;
class NotificationContainer extends Component
{
    public $request;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
       $this->request = Request::where('id',$id)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.registrar.component.notification-container');
    }
}
