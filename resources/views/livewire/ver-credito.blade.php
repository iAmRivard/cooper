<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <a href="{{route('cuenta.cuenta', $cuenta)}}" class="a-link">
                    Imprimir
                </a> --}}
                {{-- <x-jet-welcome /> --}}
                <div class="flex justify-center mb-4 mt-4">
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">Crédito </div>
                            <div class="stat-value text-primary">#{{$credito->id}}</div>
                            <div class="stat-desc">{{$credito->tipoCredito->nombre}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Monto otorgado</div>
                            <div class="stat-value text-green-900">${{number_format($credito->monto, 2)}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Saldo a la fecha</div>
                            <div class="stat-value text-sky-900">${{number_format($credito->saldo_actual, 2)}}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Cuotas</div>
                            <div class="stat-value text-sky-900"> {{ $credito->cuota_actual}}/{{ $credito->cantidad_cuotas}}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Tasa Interés</div>
                            <div class="stat-value text-rose-900"> {{ $credito->porcentaje_interes}}%</div>
                        </div>
                       
                        <div class="stat">
                            <div class="stat-value">{{$credito->socio->nombres}}</div>
                            <div class="stat-title">{{$credito->socio->apellidos}}</div>
                        </div>

            
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                            <tr>
                                <td class="text-center">{{ $movimiento->id }}</td>
                                <td class="text-center font-bold">{{$movimiento->tipoMovimiento->nombre}}</td>
                                <td class="text-center">{{ $movimiento->descripcion }}</td>
                                <td class="font-bold text-center" >
                                   <span style="@if ($movimiento->tipoMovimiento->naturaleza == 0) color: green; @else color: red; @endif">
                                        ${{ number_format($movimiento->monto,2) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $movimiento->created_at }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$movimientos->links()}}
            </div>

        </div>
    </div>
</div>

