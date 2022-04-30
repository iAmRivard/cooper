<div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8">

                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar cuenta') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" wire:model="buscar" />
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
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Abono</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">Retiro</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $cuenta->no_cuenta}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            {{ $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}
                                        </td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $cuenta->tipoCuenta->nombre }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            @livewire('cuentas.abonos', ['cuenta' => $cuenta], key($cuenta->id))

                                        </td>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            @livewire('cuentas.retiros', ['cuenta' => $cuenta], key($cuenta->id))

                                        </td>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            <a href="{{ route('ver.cuenta', $cuenta) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                                ver cuenta
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="px-6 py-3 flex justify-items-center justify-around">
                    {{$cuentas->links()}}
                </div>

            </div>

        </div>

    </div>

</div>
