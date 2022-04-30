<div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h2 class="text-xl mx-4 py-8">Consulta / Creación de Socios</h2>

                <div class="flex justify-end mx-24">
                    @livewire('socios.create-socio')
                </div>

                {{-- Probablemente la busqueda y ver productos sea
                    un componente de Livewire --}}
                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar socio') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" wire:model="buscarSocio" />
                    </div>
                </div>

                <div class="container py-8 flex justify-center">

                    @if ($socios->count())

                        <table class="table-fixed border-collapse border border-slate-500 ">
                            <thead>
                                <tr>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Nombre</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Apellido</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">DUI</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">NIT</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Direción</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Salario</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800"></th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($socios as $item)
                                    <tr>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->nombres}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{
                                            $item->apellidos}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->dui }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->nit}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->direccion }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">${{ $item->salario }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            <a class="cursor-pointer" wire:click="editar( {{$item}} )">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            <a href="{{route('ver.socio', $item)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
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
                <x-jet-input type="text" class="w-full" wire:model="socio.nombres" />
                <x-jet-input-error for="nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Apellidos del Socio" />
                <x-jet-input type="text" class="w-full" wire:model="socio.apellidos" />
                <x-jet-input-error for="apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label value="DUI del Socio" />
                <x-jet-input type="text" class="w-full" wire:model="socio.dui" />
                <x-jet-input-error for="dui" />
            </div>

            <div class="mb-4">
                <x-jet-label value="NIT del Socio" />
                <x-jet-input type="text" class="w-full" wire:model="socio.nit" />
                <x-jet-input-error for="nit" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Dirección del Socio" />
                <x-jet-input type="text" class="w-full" wire:model="socio.direccion" />
                <x-jet-input-error for="direccion" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Salario del Socio" />
                <x-jet-input type="number" class="w-full" wire:model="socio.salario" />
                <x-jet-input-error for="salario" />
            </div>

            <div class="mb-4">
                <x-jet-label value="Correo del Socio" />
                <x-jet-input type="email" class="w-full" wire:model="socio.correo" />
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
