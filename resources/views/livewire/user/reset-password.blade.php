<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Actualizar contraseña
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Actualizar Contraseña
        </x-slot>

        <x-slot name="content">

            {{-- Nombre del socio --}}
            <div class="w-full mb-4">
                <x-jet-label value="Contraseña" />
                <x-jet-input
                    type="password"
                    class="w-full"
                    wire:model.defer="password"
                    placeholder="contraseña"
                />
                <x-jet-input-error for="password" />
            </div>
            {{-- Confirmar contraseña --}}
            <div class="w-full mb-4">
                <x-jet-label value="Confirmar contraseña" />
                <x-jet-input
                    type="password"
                    class="w-full"
                    wire:model.defer="confirmPassword"
                    placeholder="contraseña"
                />
                <x-jet-input-error for="password" />
            </div>


        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="actualizar" wire:loading.remove wire:target="actualizar">
                Actualizar
            </x-jet-button>

            <span wire:loading wire:target="actualizar">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>

</div>
