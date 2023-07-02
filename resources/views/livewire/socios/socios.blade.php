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
                </div>
                <div class="container flex justify-center py-8">
                    @if ($socios->count())
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Empresa</th>
                                    <th>Cod. Empleado</th>
                                    <th>DUI</th>
                                    <th># de Socio</th>
                                    <th>Ap. Quincenal</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socios as $item)
                                    <tr>
                                        <td class="font-bold">{{ $item->id }}</td>
                                        <td>{{ $item->nombres}} </td>
                                        <td>{{ $item->apellidos}}</td>
                                        <td class="font-bold" >{{ $item->empresa->nombre }}</td>
                                        <td>{{ $item->codigo_empleado }}</td>
                                        <td>{{ $item->dui }}</td>
                                        <td>{{ $item->numero_socio ?? 'No definido' }}</td>
                                        <td class="font-bold" >${{ $item->aportacion }}</td>
                                        <td>
                                            <a class="cursor-pointer" wire:click="editar( {{$item}} )">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('ver.socio', $item)}}" class="font-semibold">
                                                Ver socio
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                {{-- <div class="w-1/2 pr-4">
                    <x-jet-label value="Número de socio" />
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model.defer="numero_socio"
                        placeholdeR="Número de socio"
                    />
                    <x-jet-input-error for="numero_socio" />
                </div> --}}

                {{-- Codigo del empleado --}}
                <div class="w-full">
                    <x-jet-label value="Código de empleado" />
                    <x-jet-input
                        placeholder="Código de empleado"
                        type="text"
                        class="w-full"
                        wire:model.defer="socio.codigo_empleado"
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
                {{-- Correo electronico --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label value="Correo del Socio" />
                    <x-jet-input
                        type="email"
                        class="w-full"
                        wire:model.defer="socio.correo"
                        placeholdeR="ejemplo@ejemplo.com"
                    />
                    <x-jet-input-error for="correo" />
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
                    <x-jet-input-error for="empresa" />
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
