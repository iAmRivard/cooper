<?php

namespace App\Http\Livewire\Reset;

use Livewire\Component;

use App\Models\User;

class ResetPassword extends Component
{
    public $open_modal = false;
    public $error = false;

    public $contrasenna, $confirmar_contrasenna, $user_id;

    protected $rules = [
        'contrasenna' => 'required',
        'confirmar_contrasenna' => 'required'
    ];

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function render()
    {
        return view('livewire.reset.reset-password');
    }

    public function update()
    {

        if($this->contrasenna == $this->confirmar_contrasenna)
        {
            $usuario = User::find($this->user_id);

            $usuario->password = bcrypt($this->contrasenna);

            $usuario->save();

            $this->emit('exito', 'Contraseña Actualizada con exito');


            $this->reset([
                'contrasenna',
                'confirmar_contrasenna',
                'open_modal'
            ]);
        } else {
            $this->error = true;
        }

    }
}
