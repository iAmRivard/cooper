<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Activar / Desactivar socio
    </x-jet-nav-link>

    {{-- Desactivar cuenta --}}
    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            @if ($socio->estado)
            Desactivar socio
            @else
            Activar socio
            @endif
        </x-slot>

        <x-slot name="content">
            <p>Seguro que desea @if ($socio->estado) desactivar @else activar @endif el socio # {{ $socio->id }} de <strong>{{ $socio->nombres . $socio->apellidos }}</strong> </p>
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
