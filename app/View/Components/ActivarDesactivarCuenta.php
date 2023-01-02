<?php

namespace App\View\Components;

use App\Models\Ctr_cuenta;
use Illuminate\View\Component;

class ActivarDesactivarCuenta extends Component
{

    public $id;

    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $status)
    {
        $this->id = $id;

        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.activar-desactivar-cuenta');
    }
}
