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
                <x-jet-label>Buscar Cuetna</x-jet-label>
                <x-jet-input
                    class="w-1/2"
                    type="text"
                    wire:model="buscar_cuenta"
                    wire:keydown="buscar"
                    placeholder="Buscar cuenta por Nº de Cuenta"
                />
                <i class="fa-solid fa-magnifying-glass cursor-pointer" name="buscar" wire:click="buscar"></i>
            </div>

            {{-- Selección de cuenta --}}
            <div class="mb-4">
                <select class="w-full select select-bordered overflow-hidden" size="3" required wire:model="cuenta_select">

                    @foreach ($cuentas as $cuenta)
                        <option value="{{$cuenta->id}}">
                            {{$cuenta->no_cuenta}} | {{$cuenta->socio->nombres}} {{$cuenta->socio->apellidos}} | {{ $cuenta->tipoCuenta->nombre }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-4 flex">

                {{-- Monto de Depostio --}}
                <div class="w-1/2">
                    <x-jet-label>Monto</x-jet-label>
                    <input
                        class="input input-bordered w-full"
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
