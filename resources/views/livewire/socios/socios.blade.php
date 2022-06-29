<div>
    <x-slot name="header">
        @livewire('socios.create-socio')
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h2 class="text-xl mx-4 py-8"> <b> Consulta / Creación de Socios</b></h2>

                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar socio') }}" />
                        <x-jet-input placeholder="Buscar socio por: Nombre o DUI" class="block mt-1 w-full" type="text" wire:model="buscarSocio" />
                    </div>
                </div>

                <div class="container py-8 flex justify-center">

                    @if ($socios->count())

                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>DUI</th>
                                    <th>NIT</th>
                                    <th>Direción</th>
                                    <th>Salario</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($socios as $item)
                                    <tr>
                                        <td><b> {{ $item->nombres}} </b></td>
                                        <td>{{ $item->apellidos}}</td>
                                        <td> <b>{{ $item->dui }}</b></td>
                                        <td>{{ $item->nit}}</td>
                                        <td>{{ $item->direccion }}</td>
                                        <td>${{ $item->salario }}</td>
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

            <div class="mb-4">
                <x-jet-label value="Nombre del Socio" />
                <x-jet-input type="text" class="w-full" wire:model.defer="socio.nombres" />
                <x-jet-input-error for="nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos del Socio" />
                <x-jet-input type="text" class="w-full" wire:model.defer="socio.apellidos" />
                <x-jet-input-error for="apellidos" />
            </div>

            <div class="mb-4 flex">
                <div class="w-1/2">
                    <x-jet-label value="DUI del Socio" />
                    <x-jet-input type="text" class="w-full" disabled wire:model.defer="socio.dui" />
                    <x-jet-input-error for="dui" />
                </div>

                <div class="w-1/2">
                    <x-jet-label value="NIT del Socio" />
                    <x-jet-input type="text" class="w-full" wire:model.defer="socio.nit" />
                    <x-jet-input-error for="nit" />
                </div>
            </div>


            <div class="mb-4">
                <x-jet-label value="Dirección del Socio" />
                <x-jet-input type="text" class="w-full" wire:model.defer="socio.direccion" />
                <x-jet-input-error for="direccion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Salario del Socio" />
                <x-jet-input type="number" class="w-full" wire:model.defer="socio.salario" />
                <x-jet-input-error for="salario" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Correo del Socio" />
                <x-jet-input type="email" class="w-full" wire:model.defer="socio.correo" />
                <x-jet-input-error for="correo" />
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
