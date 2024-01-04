<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            Proyeccion de Intereses
        </div>
    </x-slot>

    <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            @foreach ($cuentas as $cuenta)
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h2 class="font-bold">#{{ $cuenta->no_cuenta }} - ;{{ $cuenta->socio->nombres}}</h2>
                <p>{{ $cuenta->tipoCuenta->nombre }}</p>
                <p><strong>Saldo Actual:</strong> {{ $cuenta->saldo_actual }}</p>
                <p><strong>Fecha Inicio :</strong> {{ $cuenta->fecha_inicio }}</p>
                <p><strong>Fecha Fin :</strong> {{ $cuenta->fecha_fin }}</p>
                <p><strong>Plazos :</strong> {{ $cuenta->quincena_actual }}/{{ $cuenta->cantidad_quincenas }}</p>



                <!-- Inicio de la proyección de cuotas -->
                @if (!empty($cuenta->proyeccion_cuotas))
                    <h3 class="font-bold mt-4">Proyección de Cuotas</h3>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Proximas 3 Cuotas</th>
                                <th class="px-4 py-2">Interés</th>
                                <th class="px-4 py-2">Capital</th>
                                <th class="px-4 py-2">Monto</th>
                                <th class="px-4 py-2">Tasa de Interés</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuenta->proyeccion_cuotas as $cuota)
                                <tr>
                                    <td class="border px-4 py-2">{{ $cuota['quincena'] }}</td>
                                    <td class="border px-4 py-2">{{ $cuota['interes'] }}</td>
                                    <td class="border px-4 py-2">{{ $cuota['capital'] }}</td>
                                    <td class="border px-4 py-2">{{ $cuota['monto'] }}</td>
                                    <td class="border px-4 py-2">{{ $cuota['tasaInteres'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No hay proyección disponible</p>
                @endif
                <!-- Fin de la proyección de cuotas -->
            </div>
            @endforeach
        </div>
    </div>
</div>

</x-app-layout>