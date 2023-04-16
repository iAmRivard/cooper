<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('creditos.activar-desactivar', ['credito' => $credito])
            @livewire('creditos.de-baja', ['credito' => $credito])

            @if (count($movimientos) == 1)
                @livewire('creditos.editar', ['credito' => $credito])
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex justify-center m-4 mt-4">
                    <div class="shadow stats">
                        <div class="stat">
                            <div class="stat-title">Crédito </div>
                            <div class="stat-value text-primary">#{{$credito->id}}</div>
                            <div class="stat-desc">{{$credito->tipoCredito->nombre}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Monto otorgado</div>
                            <div class="text-green-900 stat-value">${{number_format($credito->monto, 2)}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Cuota</div>
                            <div class="stat-value text-rose-900"> ${{ $credito->cuotaFija()->cuota_fija}}</div>
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

                        <div class="stat">
                            <div class="stat-value @if($credito->estado == 0) text-rose-900 @endif" >{{ $credito->estado == 1 ? 'Activado' : 'Desactivado' }}</div>
                            <div class="stat-title">Estado</div>
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                            <tr>
                                <td class="text-center">{{ $movimiento->id }}</td>
                                <td class="font-bold text-center">{{$movimiento->tipoMovimiento->nombre}}</td>
                                <td class="text-center">{{ $movimiento->descripcion }}</td>
                                <td class="font-bold text-center" >
                                   <span style="@if ($movimiento->tipoMovimiento->naturaleza == 0) color: green; @else color: red; @endif">
                                        ${{ number_format($movimiento->monto,2) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $movimiento->created_at }}</td>
                                <td>
                                    <a href="{{ route('credito.abono', $movimiento) }}" class="a-link">
                                        re Imprimir
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$movimientos->links()}}
                <hr/>
                <div class="text-center">
                    <h4>
                        <b>PLAN DE PAGO</b>
                    </h4>
                </div>
                <div class="flex justify-center mb-4">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cuota</th>
                                <th>Intereses</th>
                                <th>Interes Acumulado</th>
                                <th>Cuota Capital</th>
                                <th>Saldo</th>
                                <th>Capital Amortizado</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plan_pago as $pago)
                                <tr>
                                    <td class="text-center">#{{ $pago->nro_cuota }}</td>
                                    <td class="text-center">${{ $pago->cuota }}</td>
                                    <td class="text-center">${{ $pago->interes }}</td>
                                    <td class="text-center">${{ $pago->interes_acumulado }}</td>
                                    <td class="text-center">${{ $pago->cuota_capital }}</td>
                                    <td class="text-center">${{ $pago->saldo }}</td>
                                    <td class="text-center">${{ $pago->capital_amortizado }}</td>
                                    <td class="text-center"><strong>{{ $pago->estado == 1 ? 'Pendiente' : 'Pagada' }}</strong></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

