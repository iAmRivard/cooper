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
                    <p><strong>Salario</strong> <span>${{number_format($socio->salario, 2)}}</span></p>
                </div>

                <div class="py-2">
                    @livewire('reset.reset-password', ['user_id' => $socio->user_id])
                </div>
                <hr>

                <div class="flex justify-end px-8 py-6">
                    @livewire('beneficiarios.crear', ['socio' => $socio])
                </div>

                <div class="flex justify-center py-6">
                    <table class="table table-fixed">
                        <thead>
                            <tr>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>parentesco</th>
                                <th>Fecha de Nacimiento</th>
                                <th>%</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($socio->beneficiarios as $beneficiario)
                            <tr>
                                <td>{{ $beneficiario->nombres }}</td>
                                <td>{{ $beneficiario->apellidos }}</td>
                                <td>{{ $beneficiario->parentesco }}</td>
                                <td>{{ $beneficiario->fecha_nacimiento }}</td>
                                <td>{{ $beneficiario->porcentaje }}</td>
                                <td>{{ $beneficiario->direccion }}</td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>
                <hr>
                <h3 class="text-xl px-4">Cuentas</h3>

                <div class="flex justify-center py-6">
                    <table class="table border-collapse border border-slate-500 ">
                        <thead>
                            <tr>
                                <th># de Cuenta</th>
                                <th>Tipo de cuenta</th>
                                <th>Estado</th>
                                <th>Saldo Actual</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($socio->cuentas as $cuenta)
                                <tr>
                                    <td>
                                        {{ $cuenta->no_cuenta}}
                                    </td>
                                    <td >
                                        {{ $cuenta->tipoCuenta->nombre }}
                                    </td>
                                    <td>
                                        {{ $cuenta->estado != 0 ? 'Cueta activa' : 'Cuenta Desactivada' }}
                                    </td>
                                    <td>
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
