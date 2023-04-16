<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Baja de credito
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
           ¿Esta seguro que quiere dar de baja el credito?
        </x-slot>

        <x-slot name="content">
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="dow" class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:loading.remove wire:target="dow" wire:click="dow">
                confirmar
            </x-jet-button>
            <span wire:loading wire:target="dow">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
