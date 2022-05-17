<div>
    {{-- Botón para abrir el modal --}}
    <x-jet-button wire:click="$set('open', true)">
        Crear Socio
    </x-jet-button>

    {{-- Modal --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Datos Personales
        </x-slot>

        <x-slot name="content">

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Nombre del Socio" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="nombres" />
                    <x-jet-input-error for="nombres" />
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label value="Apellidos del Socio" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="apellidos" />
                    <x-jet-input-error for="apellidos" />
                </div>
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label value="DUI del Socio" />
                    <x-jet-input
                        x-mask="99999999-9"
                        placeholder="99999999-9"
                        type="text"
                        class="w-full"
                        wire:model="dui"
                        />
                    <x-jet-input-error for="dui" />
                    {{$dui}}
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label value="NIT del Socio" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="nit" />
                    <x-jet-input-error for="nit" />
                </div>
            </div>


            <div class="mb-4">
                <x-jet-label value="Dirección del Socio" />
                <x-jet-input type="text" class="w-full" wire:model.defer="direccion" />
                <x-jet-input-error for="direccion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Salario del Socio" />
                <x-jet-input type="number" class="w-full" wire:model.defer="salario" />
                <x-jet-input-error for="salario" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Correo del Socio" />
                <x-jet-input type="email" class="w-full" wire:model.defer="correo" />
                <x-jet-input-error for="correo" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Nombre de empresa" />
                <x-jet-input type="text" class="w-full" wire:model.defer="empresa" />
                <x-jet-input-error for="empresa" />
            </div>

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
