<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Editar
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            Edición de {{ $credito->id }}
        </x-slot>

        <x-slot name="content">
            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-input-error for="tipo_credito" />
                    <x-jet-label>Selección del tipo de Credito</x-jet-label>
                    <select class="w-full select select-bordered" wire:model="tipo_credito">
                        <option>Seleccionar tipo de Credito</option>
                        @foreach($tipos_creditos as $tipo_credito)
                            <option value="{{ $tipo_credito->id }}" @if ($credito->tipo_credito_id == $tipo_credito->id) selected @endif>{{ $tipo_credito->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Número de credito --}}
                <div class="w-1/2 pl-4">
                    <x-jet-input-error for="no_cuenta" />
                    <x-jet-label value="Número de credito" />
                    <input
                        type="text"
                        placeholder="Colocar número de credito"
                        wire:model="no_cuenta"
                        class="w-full max-w-xs input input-bordered"
                    />
                </div>
            </div>
            <div class="flex mb-4">
                {{-- Nombre del socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-input-error for="monto" />
                    <x-jet-label value="Monto del credito" />
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model="monto"
                        placeholder="$0.00"
                        step="0.01"
                    />
                </div>
                {{-- Apellidos del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-input-error for="cuota_fija" />
                    <x-jet-label value="Cuota Fija" />
                    <x-jet-input
                        type="number "
                        class="w-full"
                        wire:model="cuota_fija"
                        placeholder="$0.00"
                        disabled
                    />
                </div>
            </div>
            <div class="flex mb-4">
                {{-- Porcentaje --}}
                <div class="w-1/2 pr-4">
                    <x-jet-input-error for="porcentaje" />
                    <x-jet-label value="Porcentaje de interes" />
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model="porcentaje"
                        placeholder="%"
                    />
                </div>
                {{-- Apellidos del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-input-error for="periodo" />
                    <x-jet-label value="Periodo" />
                    <x-jet-input
                        type="number "
                        class="w-full"
                        wire:model="periodo"
                        placeholder="Cantidad de quincenas"
                    />
                </div>
            </div>

            <div class="mb-4">
                <x-jet-input-error for="startCredit" />
                <x-jet-label value="Inicio de credito" />
                <input
                    type="date"
                    class="w-full input input-bordered"
                    wire:model="startCredit"
                />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="update" class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>

            <x-jet-button  wire:loading.remove wire:target="update" wire:click="update">
                confirmar
            </x-jet-button>

            <span wire:loading wire:target="update">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
