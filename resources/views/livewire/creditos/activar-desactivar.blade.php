<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Activar / Desactivar
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            @if ($credito->estado == 1)
            ¿Estas seguro de desactivar el credito {{ $credito->id }} de {{ $credito->tipoCredito->nombre }}?
            @else
            ¿Estas seguro de activar el credito {{ $credito->id }} de {{ $credito->tipoCredito->nombre }}?
            @endif
        </x-slot>

        <x-slot name="content">
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="desactivar" class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:loading.remove wire:target="updateState" wire:click="updateState">
                confirmar
            </x-jet-button>
            <span wire:loading wire:target="updateState">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
