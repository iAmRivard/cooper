<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\CrtPlanPagoDet;
use App\Models\CreditoDet;
use App\Models\Credito;

class VerCredito extends Component
{
    use WithPagination;

    public $credito;

    protected $listeners = ['render' => 'render'];

    public function mount(Credito $credito)
    {
        $this->credito = $credito;
    }

    public function render()
    {
        $movimientos = CreditoDet::where('credito_id', '=', $this->credito->id)
                                    ->orderBy('id', 'desc')
                                    ->paginate(10);

        $plan_pago  =   CrtPlanPagoDet::where('credito_id', $this->credito->id)->get();

        // dd($movimientos);

        return view('livewire.ver-credito', compact('movimientos', 'plan_pago'));
    }
}
