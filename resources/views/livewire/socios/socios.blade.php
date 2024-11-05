<div>
    <x-slot name="header">
        @livewire('socios.create-socio')
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar socio') }}" />
                        <x-jet-input placeholder="Buscar socio por: Nombre o DUI" class="block w-full mt-1" type="text" wire:model="buscarSocio" />
                    </div>
                    <div class="flex items-center ml-4">
                        <input type="checkbox" id="socioActivoCheckbox" class="mr-2" wire:model="socioActivo" checked>
                        <label for="socioActivoCheckbox">{{ __('Solo Activos/Inactivos') }}</label>
                    </div>
                </div>
                <div class="container flex justify-center py-8">
                    @if ($socios->count())
                        @include('livewire.socios.partials.table')
                    @endif
                </div>
                <div class="px-6 py-3 ">
                    {{$socios->links()}}
                </div>
            </div>
        </div>
    </div>

    {{-- Edición socio --}}
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            <h2>
                Editar información de socio
                <strong>
                    {{$socio->nombres . " " . $socio->apellidos}}
                </strong>
            </h2>
        </x-slot>

        <x-slot name='content'>
            @if ($errors->any())
                @include('livewire.socios.partials.errors-edit')
            @endif
            <div class="flex mb-4">
                {{-- Nombre del socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Nombre del Socio" />
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model.defer="socio.nombres"
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
                        wire:model.defer="socio.apellidos"
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
                        wire:model.defer="socio.numero_socio"
                        placeholdeR="Número de socio"
                    />
                    <x-jet-input-error for="socio.numero_socio" />
                </div>

                {{-- Codigo del empleado --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Código de empleado" />
                    <x-jet-input
                        placeholder="Código de empleado"
                        type="text"
                        class="w-full"
                        wire:model.defer="socio.codigo_empleado"
                    />
                    <x-jet-input-error for="socio.codigo_empleado" />
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
                        wire:model="socio.dui"
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
                        wire:model.defer="socio.nit"
                    />
                    <x-jet-input-error for="nit" />
                </div>
            </div>

            <div class="flex mb-4">
                {{-- Expiración DUI --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Fecha expiración DUI" />
                    <x-jet-input
                        type="date"
                        class="w-full"
                        wire:model.defer="socio.dui_epiracion"
                    />
                    <x-jet-input-error for="socio.dui_epiracion" />
                </div>
                {{-- Fecha de nacimiento --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Fecha de nacimiento" />
                    <x-jet-input
                        type="date"
                        class="w-full"
                        wire:model.defer="socio.fecha_nacimiento"
                    />
                    <x-jet-input-error for="socio.fecha_nacimiento" />
                </div>
            </div>

            {{-- Dirección del soción del socio--}}
            <div class="mb-4">
                <x-jet-label value="Dirección del Socio" />
                <x-jet-input
                    type="text"
                    class="w-full"
                    wire:model.defer="socio.direccion"
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
                        wire:model.defer="socio.salario"
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
                        wire:model="socio.aportacion"
                    />
                    <x-jet-input-error for="aportacion" />
                </div>
            </div>
            <div class="flex mb-4">
                {{-- Salario del socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Cargo" />
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model.defer="socio.cargo"
                        placeholder="Cargo"
                    />
                    <x-jet-input-error for="socio.cargo" />
                </div>

                {{-- Aportación del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Profesión u oficio" />
                    <x-jet-input
                        placeholder="Estudiante"
                        type="text"
                        class="w-full"
                        wire:model="socio.profesion_uficio"
                    />
                    <x-jet-input-error for="socio.profesion_uficio" />
                </div>
            </div>

            <div class="flex mb-4">
                {{-- Correo electronico --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Correo del Socio" />
                    <x-jet-input
                        type="email"
                        class="w-full"
                        wire:model.defer="socio.correo"
                        placeholdeR="ejemplo@ejemplo.com"
                    />
                    <x-jet-input-error for="socio.correo" />
                </div>

                {{-- Empresa --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Nombre de empresa" />
                    <select class="w-full select select-bordered" wire:model="socio.empresa_id">
                        <option >Seleccionar una empresa</option>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="socio.empresa_id" />
                </div>
            </div>
            <div class="flex mb-4">
                {{-- Expiración DUI --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Fecha de ingreso a la COOPERATIVA" />
                    <x-jet-input
                        type="date"
                        class="w-full"
                        wire:model="socio.fecha_inicio"
                    />
                    <x-jet-input-error for="socio.fecha_inicio" />
                </div>
                {{-- Fecha de nacimiento --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Número de personas que dependen económicamente" />
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model.defer="socio.numero_dependencia"
                    />
                    <x-jet-input-error for="socio.numero_dependencia" />
                </div>
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button class="mx-4" wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="actualizar" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar
            </x-jet-button>
            <span wire:loading wire:target="guardar">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
