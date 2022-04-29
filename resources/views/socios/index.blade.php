<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <h2 class="text-2xl px-8">Información de: {{$socio->nombres}} {{$socio->apellidos}}</h2>

                <div class="px-8 py-6">
                    <p><strong>DUI:</strong> <span>{{$socio->dui}}</span></p>
                    <p><strong>NIT</strong><span>{{$socio->nit}}</span></p>
                    <p><strong>Dirección</strong> <span>{{$socio->direccion}}</span></p>
                    <p><strong>Correo</strong> <span>{{$socio->correo}}</span></p>
                    <p><strong>Salario</strong> <span>{{number_format($socio->salario, 2)}}</span></p>
                </div>

                <div>
                    @livewire('reset.reset-password', ['user_id' => $socio->user_id])
                </div>

                <h3 class="text-xl px-4">Cuentas</h3>

                <div class="flex justify-center py-6">
                    <table class="border-collapse border border-slate-500 ">
                        <thead>
                            <tr>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800"># de Cuenta</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Tipo de cuenta</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Estado</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Saldo Actual</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($socio->cuentas as $cuenta)
                                <tr>
                                    <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                        {{ $cuenta->no_cuenta}}
                                    </td>
                                    <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                        {{ $cuenta->tipoCuenta->nombre }}
                                    </td>
                                    <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                        {{ $cuenta->estado != 0 ? 'Cueta activa' : 'Cuenta Desactivada' }}
                                    </td>
                                    <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                        {{ $cuenta->saldo_actual }}
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
