<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Crear Cuenta
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            Creación de Cuenta
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>Buscar Socio</x-jet-label>
                <x-jet-input
                    class="w-1/2 input input-bordered max-w-xs"
                    type="text"
                    x-mask="99999999-9"
                    wire:model="buscar_socio"
                    wire:keydown="buscar"
                    placeholder="Buscar socio por: Nombre o DUI"
                />
                <i class="fa-solid fa-magnifying-glass cursor-pointer"
                    name="buscar"
                    wire:click="buscar"
                >
                </i>
            </div>
            {{-- Selección de socio --}}
            <div class="mb-4">
                <select class="select select-bordered w-full overflow-hidden appearance-none" size="3" required wire:model="selec_socio">
                    @foreach ($socios as $socio)
                        <option value="{{ $socio->id }}">{{ $socio->nombres }} {{ $socio->apellidos }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="selec_socio" />
            </div>
            <div class="flex mb-4">
                {{-- selección de cuenta --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label>Selección del tipo de cuenta</x-jet-label>
                    <select class="select select-bordered w-full" wire:model="cuenta">
                        <option>Seleccionar tipo de cuenta</option>
                        @foreach($tipos_cuentas as $tipo_cuenta)
                            <option value="{{ $tipo_cuenta }}">{{ $tipo_cuenta->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="cuenta" />
                </div>
                {{-- NIT del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Número de cuenta" />
                    <input type="text"
                        placeholder="Type here"
                        wire.model.defer="numero_cuenta"
                        class="input input-bordered w-full max-w-xs"
                    />
                    <x-jet-input-error for="numero_cuenta" />
                </div>
            </div>
            @if($othersCamp)
            <div class="mb-4">
                <x-jet-label>Monto</x-jet-label>
                <x-jet-input
                    class="w-full input input-bordered"
                    type="number"
                    wire:model="monto_plazo"
                    placeholder="Ingrese el monto"
                />
            </div>
            <div class="mb-4">
                <x-jet-label>Cuotas</x-jet-label>
                <x-jet-input
                    class="w-full input input-bordered"
                    type="number"
                    wire:model="cantidad_cuotas"
                    placeholder="Ingrese la cantidad de cuotas"
                />
            </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="crear" class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:loading.remove wire:target="crear" wire:click="crear">
                crear
            </x-jet-button>
            <span wire:loading wire:target="crear">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
