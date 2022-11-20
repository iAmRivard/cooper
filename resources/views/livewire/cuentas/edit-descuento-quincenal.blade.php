<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Editar descuento
    </x-jet-nav-link>

    {{-- Desactivar cuenta --}}
    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            Cambiar desceutno_quincenal de {{ $cuenta->no_cuenta }}
        </x-slot>

        <x-slot name="content">
            <div class="w-full mb-4">
                <x-jet-label value="Número de cuenta" />
                <input type="number"
                    value="{{ number_format($centa->pago_quincenal, 2) }}"
                    wire.model.defer="descuento_quincenal"
                    class="input input-bordered w-full"
                />
                <x-jet-input-error for="descuento_quincenal" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="actualizar" class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:loading.remove wire:target="actualizar" wire:click="actualizar">
                confirmar
            </x-jet-button>
            <span wire:loading wire:target="actualizar">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
