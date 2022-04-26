<div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8" wire:model="table_off">

                {{-- <div class="flex justify-center py-8 px-8">
                    <button class="w-80 h-24 mx-8 bg-gray-800 border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        Retiros
                    </button>

                    @livewire('cuentas.abonos')
                </div> --}}

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
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">&nbsp;</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">&nbsp;</th>
                                    <th class="border boder-gray-400 px-4 py-2 text-gray-800">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $cuenta->no_cuenta}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{
                                            $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $cuenta->tipoCuenta->nombre }}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800 text-center">{{ $cuenta->saldo_actual}}</td>
                                        <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            <a class="cursor-pointer">
                                                @livewire('cuentas.abonos', ['cuenta' => $cuenta], key($cuenta->id))
                                            </a>
                                        </td>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            <a class="cursor-pointer">
                                                @livewire('cuentas.retiros', ['cuenta' => $cuenta], key($cuenta->id))
                                            </a>
                                        </td>
                                        <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                            <a href="{{ route('ver.cuenta', $cuenta) }}" class="cursor-pointer"  wire:click="verCuenta">
                                                ver cuenta
                                            </a>
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

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8" wire:loading wire:model="ver_cuenta">
                <span>Hola putitto</span>
            </div>

        </div>

    </div>


</div>
