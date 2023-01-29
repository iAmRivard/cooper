<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Retirar
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">

            <h3 wire:target="error">Retiro de cuenta</h3>

            @if($error)
                <div class="shadow-lg alert alert-error">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Error! Saldo insuficiente</span>
                    </div>
                </div>
            @endif

        </x-slot>

        <x-slot name="content">

            {{-- Buscar Cuenta --}}
            <div class="mb-4">
                <div x-data="{
                        list: true,
                        account: ''
                    }"
                    x-init="$watch('account', value => $wire.set('cuenta_select', value))"
                >
                    <div class="w-full form-control">
                        <label class="label">
                            <span class="label-text">Buscar socio</span>
                        </label>
                        <input type="text" placeholder="Código de empleado, DUI, Nombre, Número de cuenta" class="w-full input input-bordered" wire:model="cuenta_abonada" />
                        <div class="p-2 overflow-auto max-h-16" x-show="list" x-transition>
                            @foreach ($cuentas as $cuenta)
                                <button class="w-2/3 px-0 mb-2 cursor-pointer btn btn-secondary" x-on:click="account = {{ $cuenta->id }}">
                                    {{$cuenta->no_cuenta}} | {{$cuenta->socio->nombres}} {{$cuenta->socio->apellidos}} | {{ $cuenta->tipoCuenta->nombre }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 mb-4">
                <x-jet-label>Socio</x-jet-label>
                @if ($cuenta_place_holder)
                {{$cuenta_place_holder->id}} | {{$cuenta_place_holder->socio->nombres}} {{$cuenta_place_holder->socio->apellidos}} | {{ $cuenta_place_holder->tipoCuenta->nombre }}
                @endif
            </div>

            <div class="flex mb-4">

                {{-- Monto de Retiro --}}
                <div class="w-1/2">
                    <x-jet-label>Monto</x-jet-label>
                    <input
                        type="text"
                        class="w-full input input-bordered"
                        wire:model.defer="monto"
                        required
                        placeholder="$0.00"
                    />
                </div>

                {{-- Tipo de retiro --}}
                <div class="w-1/2">
                    <x-jet-label>Tipo</x-jet-label>
                    <select class="w-full select select-bordered" required wire:model.defer="tipo">
                        <option>Tipo de retiro</option>
                        @foreach($tiposMovimiento as $movimiento)
                            <option value="{{ $movimiento->id }}">
                                {{ $movimiento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            {{-- Descripción del retiro --}}
            <div class="mb-4">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea
                    rows="4"
                    class="w-full textarea textarea-bordered"
                    wire:model.defer="descripcion"
                    placeholder="Descripción del retiro"
                >
                </textarea>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:click="retirar">
                retirar
            </x-jet-button>
            <span wire:loading wire:target="retirar">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
</div>
