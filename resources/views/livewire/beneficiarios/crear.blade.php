<div>
    <x-jet-button wire:click="$set('open', true)">
        añadir beneficiario
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">

        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label>Nombres</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label>Apellidos</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label>Parentesco</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="parentesco" />
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label>Fecha de Nacimiento</x-jet-label>
                    <x-jet-input type="date" class="w-full" wire:model="fecha_nacimiento" />
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label>Porcentaje</x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model="porcentaje" placeholder="%" />
                </div>
            </div>

            <div class="bm-4">
                <x-jet-label>Dirección</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="direccion" />
            </div>

        </x-slot>
        <x-slot name="footer">

            <x-jet-button wire:click="agregar">
                Agregar
            </x-jet-button>

            @if ($error)
                <span>Porcentaje invalido</span>
            @endif

        </x-slot>
    </x-jet-dialog-modal>
</div>
