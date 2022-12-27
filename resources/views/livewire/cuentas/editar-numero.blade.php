<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Editar Número
    </x-jet-nav-link>

    {{-- Desactivar cuenta --}}
    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            Deseas cambiar el número de cuenta # {{ $cuenta->id }} {{ $cuenta->no_cuenta }} 
        </x-slot>

        <x-slot name="content">
            <div class="w-full mb-4">
                <x-jet-label value="Número de cuenta" />
                <input type="text"
                    placeholder="Ingrese el número de cuenta"
                    wire.model="numero_cuenta"
                    class="input input-bordered w-full"
                />
                <x-jet-input-error for="numero_cuenta" />
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
