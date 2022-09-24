<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;

use App\Models\Crm_socios;
use App\Models\User;

class ResetPassword extends Component
{
    public $socio, $open = false, $password, $confirmPassword;

    protected $rules = [
        'password'          => 'required',
        'confirmPassword'   => 'required'
    ];

    public function mount(Crm_socios $socio)
    {
        $this->socio = $socio;
    }

    public function render()
    {
        return view('livewire.user.reset-password');
    }

    public function actualizar()
    {
        $this->validate();

        $user = User::find($this->socio->user_id);

        $user->password =  bcrypt($this->password);
        $user->save();

        $this->emit('exito', 'Contraseña actualizada');

        $this->reset([
            'socio',
            'open',
            'password',
            'confirmPassword'
        ]);

    }
}
