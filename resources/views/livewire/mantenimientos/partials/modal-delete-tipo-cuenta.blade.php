<x-jet-dialog-modal wire:model="modalDelete">
    <x-slot name="title">
        Eliminar tipo de cuenta
    </x-slot>
    <x-slot name="content">
        <h2>
            ¿Está seguro que desea eliminar el tipo de cuenta {{ $accountDelete->nombre }}?
        </h2>

    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button class="mx-4" wire:click="$set('modalDelete', false)">
            Cancelar
        </x-jet-secondary-button>

        <x-jet-button wire:click="updateTipo" wire:loading.remove wire:target="updateTipo">
            Actualizar
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
