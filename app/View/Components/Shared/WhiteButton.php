<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class WhiteButton extends Component
{
     public $text;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        
        $this->text=$text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.white-button');
    }
}