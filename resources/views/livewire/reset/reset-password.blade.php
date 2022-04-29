<div>
    <x-jet-button wire:click="$set('open_modal', true)">
        Actualizar Contraseña
    </x-jet-button>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Actualización de contraseñan
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Nueva contraseña
                </x-jet-label>
                <x-jet-input class="w-full" type="password" required wire:model="contrasenna" />
            </div>

            <div class="mb-4">
                <x-jet-label>
                    Confirmar Contraseña
                </x-jet-label>
                <x-jet-input class="w-full" type="password" required wire:model="confirmar_contrasenna" />
            </div>

        </x-slot>

        <x-slot name="footer">
            @if ($error == true)
                <span class="text-red-600"> Error: Contraseñas incorrectas</span>
            @endif

            <x-jet-button wire:click="update">Actualizar Contraseña</x-jet-button>

        </x-slot>

    </x-jet-dialog-modal>

</div>
