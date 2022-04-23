<div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex justify-center py-8 px-8">
                    <button class="w-80 h-24 mx-8 bg-indigo-600 text-white text-2xl leading-6 font-medium py-2 px-3 rounded-lg">
                        Cargos
                    </button>

                    @livewire('cuentas.abonos')
                </div>

                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar cuenta') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" wire:model="buscarCuenta" />
                    </div>
                </div>

                <div class="container py-8 flex justify-center">
                    <div>

                        <table class="border-collapse border border-slate-500 ">
                            <thead>
                                <tr>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800"># Cuenta</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Socio</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Tipo de Cuenta</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Saldo Actual</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cuentas as $item)
                                    <tr>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->no_cuenta}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{
                                            $item->socio->nombres . " " . $item->socio->apellidos }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->id_tipo_cuenta }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $item->saldo_actual}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            {{-- <a class="cursor-pointer" wire:click="editar( {{$item}} )">
                                                <i class="fas fa-edit"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                    {{-- <div class="px-6 py-3 flex justify-items-center justify-around">
                        {{$socios->links()}}
                    </div> --}}
                </div>

            </div>

        </div>

    </div>

</div>
