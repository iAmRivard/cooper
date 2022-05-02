<div>
    <a wire:click="$set('open', true)" title="Abono a cuentas">
        <i class="fa-solid fa-piggy-bank fa-10x cursor-pointer"></i>
    </a>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label>Buscar Cuetna</x-jet-label>
                <x-jet-input class="w-auto" type="text" wire:model="buscar_cuenta" wire:keydown.enter="buscar" />
                <i class="fa-solid fa-magnifying-glass cursor-pointer" name="buscar" wire:click="buscar"></i>
            </div>

            {{-- Selección de cuenta --}}
            <div class="mb-4">
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md overflow-hidden" size="3" required wire:model="cuenta_select">

                    @foreach ($cuentas as $cuenta)
                        <option value="{{$cuenta->id}}">{{$cuenta->no_cuenta}} | {{$cuenta->socio->nombres}} {{$cuenta->socio->apellidos}}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-4">
                <x-jet-label>Monto</x-jet-label>
                <x-jet-input class="w-full" type="number" wire:model="monto" required />
            </div>

            <div class="mb-4">
                <x-jet-label>Tipo</x-jet-label>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md" required wire:model="tipo">
                    <option></option>
                    @foreach($tiposMovimiento as $movimiento)
                        <option value="{{ $movimiento->id }}">{{ $movimiento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea rows="4" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"  wire:model="descripcion"></textarea>
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
