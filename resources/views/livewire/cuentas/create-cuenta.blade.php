<div>
    <x-jet-button wire:click="$set('open', true)">
        Crear cuenta
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Creación de Cuenta
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label>Buscar Socio</x-jet-label>
                <x-jet-input
                    class="w-1/2"
                    type="text"
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

            {{--    Selección de socio --}}
            <div class="mb-4">
                <select class="w-full select overflow-hidden appearance-none" size="3" required wire:model="selec_socio">

                    @foreach ($socios as $socio)
                        <option value="{{ $socio->id }}">{{ $socio->nombres }} {{ $socio->apellidos }}</option>
                    @endforeach

                </select>
            </div>

            <div class="mb-4">
                <x-jet-label>Selección del tipo de cuenta</x-jet-label>
                <select class="w-full select" wire:model="tipo_cuenta">
                    <option></option>
                    @foreach($tipos_cuentas as $tipo_cuenta)
                        <option value="{{ $tipo_cuenta->id }}">{{ $tipo_cuenta->nombre }}</option>
                    @endforeach

                </select>
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:click="crear">
                crear
            </x-jet-button>
            <span wire:loading wire:target="crear">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
</div>
