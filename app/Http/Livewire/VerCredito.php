<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;

use App\Models\CreditoDet;
use App\Models\Credito;

class VerCredito extends Component
{
    use WithPagination;

    public $credito;

    public function mount(Credito $credito)
    {
        $this->credito = $credito;
    }

    public function render()
    {
        $movimientos = CreditoDet::where('credito_id', '=', $this->credito->id)
                                    ->orderBy('id', 'desc')
                                    ->paginate(10);

        return view('livewire.ver-credito', compact('movimientos'));
    }
}
