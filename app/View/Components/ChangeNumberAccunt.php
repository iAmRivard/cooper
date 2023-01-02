<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChangeNumberAccunt extends Component
{
    public $number;

    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($number, $id)
    {
        $this->id       =   $id;
        $this->number   =   $number;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.change-number-accunt');
    }
}
