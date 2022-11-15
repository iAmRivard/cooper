<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Activar / Desactivar cuenta
    </x-jet-nav-link>

    {{-- Desactivar cuenta --}}
    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            @if ($cuenta->estado)
            Desactivar cuenta
            @else
            Activar cuenta
            @endif
        </x-slot>

        <x-slot name="content">
            <p>Seguro que desea @if ($cuenta->estado) desactivar @else activar @endif la cuenta # {{ $cuenta->id }} de <strong>{{ $cuenta->socio->nombres . $cuenta->socio->apellidos }}</strong> </p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:loading.remove wire:target="desactivar" class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:loading.remove wire:target="desactivar" wire:click="desactivar">
                confirmar
            </x-jet-button>
            <span wire:loading wire:target="desactivar">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
