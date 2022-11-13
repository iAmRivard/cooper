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
            <div class="flex mb-4">
                {{-- Nombre del socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Nombre del Socio" />
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model.defer="nombres"
                        placeholder="Nombres"
                    />
                    <x-jet-input-error for="nombres" />
                </div>

                {{-- Apellidos del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Apellidos del Socio" />
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model.defer="apellidos"
                        placeholder="Apellidos"
                    />
                    <x-jet-input-error for="apellidos" />
                </div>
            </div>

            <div class="flex mb-4">
                {{-- Numero de socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Número de socio" />
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model.defer="numero_socio"
                        placeholdeR="Número de socio"
                    />
                    <x-jet-input-error for="numero_socio" />
                </div>

                {{-- Codigo del empleado --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Código de empleado" />
                    <x-jet-input
                        placeholder="Código de empleado"
                        type="text"
                        class="w-full"
                        wire:model.defer="codigoEmpleado"
                    />
                    <x-jet-input-error for="codigoEmpleado" />
                </div>
            </div>

            <div class="flex mb-4">
                {{-- DUI del socio --}}
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
                </div>

                {{-- NIT del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="NIT del Socio" />
                    <x-jet-input
                        x-mask="9999-999999-999-9"
                        placeholder="9999-999999-999-9"
                        type="text"
                        class="w-full"
                        wire:model.defer="nit"
                    />
                    <x-jet-input-error for="nit" />
                </div>
            </div>

            {{-- Dirección del soción del socio--}}
            <div class="mb-4">
                <x-jet-label value="Dirección del Socio" />
                <x-jet-input
                    type="text"
                    class="w-full"
                    wire:model.defer="direccion"
                    placeholder="Dirección de residencia del socio"
                />
                <x-jet-input-error for="direccion" />
            </div>

            <div class="flex mb-4">
                {{-- Salario del socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Salario del Socio" />
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model.defer="salario"
                        placeholder="$400.00"
                    />
                    <x-jet-input-error for="salario" />
                </div>

                {{-- Aportación del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Aportacion" />
                    <x-jet-input
                        placeholder="$10.00"
                        type="number"
                        class="w-full"
                        wire:model="aportacion"
                    />
                    <x-jet-input-error for="aportacion" />
                </div>
            </div>

            <div class="flex mb-4">
                {{-- Correo electronico --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Correo del Socio" />
                    <x-jet-input
                        type="email"
                        class="w-full"
                        wire:model.defer="correo"
                        placeholdeR="ejemplo@ejemplo.com"
                    />
                    <x-jet-input-error for="correo" />
                </div>

                {{-- Empresa --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Nombre de empresa" />
                    <select class="select select-bordered w-full" wire:model="empresa">
                        <option >Seleccionar una empresa</option>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="empresa" />
                </div>
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
