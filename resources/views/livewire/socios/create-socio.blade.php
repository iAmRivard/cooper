<div>
    {{-- Botón para abrir el modal --}}
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Crear Socio
    </x-jet-nav-link>

    {{-- Modal --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Datos Personales
        </x-slot>

        <x-slot name="content">
            @include('livewire.socios.partials.campos')
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="guardar" wire:loading.remove wire:target="guardar">
                Crear Socio
            </x-jet-button>
            <span wire:loading wire:target="guardar">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
