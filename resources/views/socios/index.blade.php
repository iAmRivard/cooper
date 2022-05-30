<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div class="flex my-2 mx-2">

                    <div class="w-1/2 border">
                        <h2 class="flex justify-center">INFORMACIÓN DE SOCIO</h2>

                        <strong>Nombres:</strong> <span>{{ $socio->nombres }}</span>
                        <br>
                        <strong>Apellidos:</strong> <span>{{ $socio->apellidos }}</span>
                        <br>
                        <strong>DUI:</strong> <span>{{ $socio->dui }}</span>
                        <br>
                        <strong>NIT:</strong> <span>{{ $socio->nit }}</span>
                        <br>
                        <strong>Correo:</strong> <span>{{ $socio->correo }}</span>
                        <br>
                        <strong>Estado:</strong> {{ $socio->estado = 1 ? 'Activo' : 'Inactivo' }}
                    </div>

                    <div class="w-1/2 border">
                        <h2 class="flex justify-center">CUENTAS / CREDITOS ACTIVAS </h2>

                        @foreach($socio_cuentas as $socio_cuenta)
                            <div class="border">
                                <h3 class="inline">#{{ $socio_cuenta->no_cuenta }}</h3>
                                <br>
                                <span class="inline">{{ $socio_cuenta->tipoCuenta->nombre }}</span>
                                <br>
                                <span>${{ $socio_cuenta->saldo_actual }}</span>
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="w-full">

                    <table class="table border-collapse border border-slate-500 ">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Referencia</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- @foreach ($socio->cuentas->movimientos as $movimiento)
                                <tr>
                                    <td>
                                        {{ $movimiento->tipo->nombre}}
                                    </td>


                                </tr>
                            @endforeach --}}

                        </tbody>

                    </table>

                </div>


            </div>

        </div>

    </div>

</x-app-layout>
