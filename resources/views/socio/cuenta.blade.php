<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de cuenta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="flex justify-center mb-4 mt-4">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-title">Numero de cuenta </div>
                        <div class="stat-value text-primary">#{{$cuenta->id}}</div>
                        <div class="stat-desc">{{$cuenta->tipoCuenta->nombre}}</div>
                    </div>
                    @if ($cuenta->tipoCuenta->plazo)
                    <div class="stat">
                        <div class="stat-title">Monto Apertura</div>
                        <div class="stat-value text-sky-900">${{number_format($cuenta->monto_plazo)}}</div>
                        <div class="stat-desc">MONTO INICIAL</div>
                    </div>
                    @endif
                    <div class="stat">
                        <div class="stat-title">Saldo a la fecha</div>
                        <div class="stat-value text-green-900">${{number_format($cuenta->saldo_actual, 2)}}</div>
                        @if ($cuenta->tipoCuenta->plazo)
                        <div class="stat-desc">MONTO INICIAL + INTERESES</div>
                        @else
                        <div class="stat-desc">MONTO INICIAL + ABONOS/INTERESES</div>
                        @endif
                    </div>
                    <div class="stat">
                        <div class="stat-value">{{$cuenta->socio->nombres}}</div>
                        <div class="stat-title">{{$cuenta->socio->apellidos}}</div>
                    </div>

                    @if ($cuenta->tipoCuenta->plazo)
                    <div class="stat">
                        <div class="stat-title">{{$cuenta->finalizado ? 'Finalizado' : 'Ejecución'}}</div>
                        <div class="stat-value">{{ $cuenta->quincena_actual }}@if($cuenta->quincena_actual != null)/@else / @endif{{ $cuenta->cantidad_quincenas }}</div>
                        <div class="stat-desc">CUOTAS</div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Concepto</th>
                            <th>Monto</th>
                            <th>Saldo a la fecha</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cuenta->mv as $detalle)
                        {{$detalle}}
                        <tr>
                            <th>{{ $detalle->id }}</th>
                            <td>{{ $detalle->concepto }}</td>
                            <td class="@if($detalle->tipo->naturaleza == 1) text-green-600 @else text-red-600 @endif">
                                $ {{ number_format($detalle->monto, 2) }}
                            </td>
                            <td>
                                $ {{ number_format($detalle->saldo_fecha, 2) }}
                            </td>
                            <td>
                                {{ $detalle->tipo->nombre }}
                            </td>
                            <td>
                                {{ date_format($detalle->created_at, 'd/m/Y') }}
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
