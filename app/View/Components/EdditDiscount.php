<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EdditDiscount extends Component
{
    public $id;

    public $discount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $discount)
    {
        $this->id       =   $id;

        $this->discount =   $discount;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eddit-discount');
    }
}
