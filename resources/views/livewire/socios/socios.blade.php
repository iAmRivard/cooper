<div>
    {{-- Stop trying to control. --}}

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

                        {{$buscarSocio}}
                    </div>
                </div>

                <div class="container py-8 flex justify-center">

                    @if ($socios->count())

                        <table class="border-collapse border border-slate-500 ">
                            <thead>
                                <tr>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Nombre</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Apellido</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">DUI</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">NIT</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Direción</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Estado</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($socios as $socio)
                                    <tr>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $socio->nombres}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{
                                            $socio->apellidos}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $socio->dui }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $socio->nit}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $socio->direccion }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $socio->salario }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            {{-- {{route('admin.productos.edit')}} --}}
                                            <a href="#" class="">
                                                <button type="button" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">Editart</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    @endif
                </div>

            </div>


        </div>


    </div>


</div>
