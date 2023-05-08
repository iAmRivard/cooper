<div>
    <x-jet-button wire:click="$set('open', true)">
        añadir beneficiario
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">

        </x-slot>
        <x-slot name="content">

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label>Nombres</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="nombres" placeholder="Juan" />
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label>Apellidos</x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="apellidos" placeholder="Lopez" />
                </div>
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label>Parentesco</x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="parentesco" placeholder="Hermano" />
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label>Número de teléfono </x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="phone_number" placeholder="7777-7777" />
                </div>
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label>Fecha de Nacimiento</x-jet-label>
                    <x-jet-input type="date" class="w-full" wire:model="fecha_nacimiento" placeholder="dd-mm-aaaa" />
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label>Porcentaje</x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model="porcentaje" placeholder="%" />
                </div>
            </div>

            <div class="bm-4">
                <x-jet-label>Dirección</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="direccion" placeholder="San Salvador" />
            </div>

        </x-slot>
        <x-slot name="footer">

            @if ($error)
                <span>Porcentaje invalido</span>
            @endif

            <x-jet-button wire:click="agregar">
                Agregar
            </x-jet-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
