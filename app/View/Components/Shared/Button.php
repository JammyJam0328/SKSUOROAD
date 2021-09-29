<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class Button extends Component
{
    public $text;
    public $color;
    public $method;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color,$text,$method)
    {
        $this->color=$color;
        $this->method=$method;
        $this->text=$text;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.button');
    }
}