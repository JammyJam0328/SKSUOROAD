<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class ConfirmModal extends Component
{
    public $message;
    public $title;
    public $method;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$message,$method)
    {
        $this->title=$title;
        $this->message=$message;
        $this->method=$method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.confirm-modal');
    }
}
