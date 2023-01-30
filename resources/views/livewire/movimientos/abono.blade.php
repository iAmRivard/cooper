<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Abonar
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Abono a cuenta
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
                        <input type="text" placeholder="Código de empleado, DUI, Nombre, Número de cuenta" class="w-full input input-bordered" wire:model="buscar_cuenta" />
                        <div class="p-2 overflow-auto max-h-16" x-show="list" x-transition>
                            @foreach ($cuentas as $cuenta)
                                <button class="w-2/3 px-0 mb-2 cursor-pointer btn btn-secondary" x-on:click="account = {{ $cuenta->id }}">
                                    {{$cuenta->id}} | {{$cuenta->socio->nombres}} {{$cuenta->socio->apellidos}} | {{ $cuenta->tipoCuenta->nombre }}
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
                {{-- Monto de Depostio --}}
                <div class="w-1/2">
                    <x-jet-label>Monto</x-jet-label>
                    <input
                        class="w-full input input-bordered"
                        type="text"
                        type="number"
                        wire:model.defer="monto"
                        required
                        placeholder="$0.00"
                    />
                </div>

                {{-- Tipo de Depostio --}}
                <div class="w-1/2">
                    <x-jet-label>Tipo</x-jet-label>
                    <select class="w-full select select-bordered" required wire:model.defer="tipo">
                        <option>Tipo de desposito</option>
                        @foreach($tiposMovimiento as $movimiento)
                            <option value="{{ $movimiento->id }}">
                                {{ $movimiento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            {{-- Descripción del movimiento --}}
            <div class="mb-4">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea
                    rows="4"
                    class="w-full textarea textarea-bordered"
                    wire:model.defer="descripcion"
                    placeholder="Descripción del Abono"
                >
                </textarea>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:click="abonar">
                abonar
            </x-jet-button>
            <span wire:loading wire:target="abonar">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
</div>
