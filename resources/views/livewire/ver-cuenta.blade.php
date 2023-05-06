<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('cuentas.activar-desactivar-cuenta', ['cuenta' => $cuenta])
            @livewire('cuentas.editar-numero', ['cuenta' => $cuenta])
            @livewire('cuentas.edit-descuento-quincenal', ['cuenta' => $cuenta])
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                {{-- <a href="{{route('cuenta.cuenta', $cuenta)}}" class="a-link">
                Imprimir
                </a> --}}
                @include('partials.cuentas.resume-cuenta')
                @if ($cuenta->tipoCuenta->plazo == true)
                <div class="flex justify-center gap-4 mt-4 mb-4">
                    {{-- fecha de inicio --}}
                    <div class="shadow stats">
                        <div class="stat">
                            <div class="stat-title">Fecha de inicio</div>
                            <div class="stat-value">{{ $cuenta->fecha_inicio }}</div>
                        </div>
                    </div>
                    {{-- Fecha fin --}}
                    <div class="shadow stats">
                        <div class="stat">
                            <div class="stat-title">Fecha fin</div>
                            <div class="stat-value">{{ $cuenta->fecha_fin }}</div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="flex justify-center mb-4">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Saldo a la fecha</th>
                                <th>fecha</th>
                                <th>Tipo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                            <tr>
                                <td class="text-center">{{ $movimiento->id }}</td>
                                <td class="text-center">{{ $movimiento->concepto }}</td>
                                <td class="font-bold text-center">
                                    <span
                                        style="@if ($movimiento->naturaleza == 1) color: green; @else color: red; @endif">
                                        ${{ number_format($movimiento->monto,2) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    ${{ $movimiento->saldo_fecha }}
                                </td>
                                <td class="text-center">{{ $movimiento->created_at }}</td>
                                <td class="text-center">{{$movimiento->tipo->nombre}}</td>
                                <td>
                                    <a href="{{ route('cuenta.abono', $movimiento) }}" class="a-link">
                                        re Imprimir
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-4">
                    {{$movimientos->links()}}
                </div>
            </div>

        </div>
    </div>
</div>
