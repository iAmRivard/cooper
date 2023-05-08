<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Editar comentario
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            Editar Comentario
        </x-slot>

        <x-slot name="content">
            <x-jet-label>Selección del porcentaje</x-jet-label>
            <x-jet-input type="text" class="w-full" wire:model="comment" placeholder="Pago el 15 de cada mes" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="saveComment" class="mx-4" wire:click="$set('open', false)">
                cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:loading.remove wire:target="saveComment" wire:click="saveComment">
                confirmar
            </x-jet-button>
            <span wire:loading wire:target="saveComment">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
