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
                            <div class="stat-title">Numero de cuenta</div>
                            <div class="stat-value text-primary">{{$cuenta->no_cuenta}}</div>
                            <div class="stat-desc">{{$cuenta->tipoCuenta->nombre}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Saldo a la fecha</div>
                            <div class="stat-value text-green-900">${{number_format($cuenta->saldo_actual, 2)}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">{{$cuenta->socio->nombres}}</div>
                            <div class="stat-title">{{$cuenta->socio->apellidos}}</div>
                        </div>
                    </div>
                </div>
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
                                <td class="font-bold text-center" >
                                   <span style="@if ($movimiento->naturaleza == 1) color: green; @else color: red; @endif">
                                        ${{ number_format($movimiento->monto,2) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    {{ $movimiento->saldo_fecha }}
                                </td>
                                <td class="text-center">{{ $movimiento->created_at }}</td>
                                <td class="text-center">{{$movimiento->tipo->nombre}}</td>
                                <td>
                                    <a href="{{ route('cuenta.re.impresion', $movimiento->id) }}" class="a-link">
                                        re Imprimir
                                    </a>
                                </td>
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
