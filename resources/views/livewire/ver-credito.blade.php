<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <a href="{{route('cuenta.cuenta', $cuenta)}}" class="a-link">
                Imprimir
            </a> --}}

            <h2>{{$credito->id}}</h2>
            <div class="flex justify-center">

                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>Concepto</th> --}}
                            <th>Monto</th>
                            <th>fecha</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $movimiento)

                        <tr>
                            {{-- <td>{{ $movimiento->concepto }}</td> --}}
                            <td>${{ number_format($movimiento->monto,2) }}</td>
                            <td>{{ $movimiento->created_at }}</td>
                            <td>{{$movimiento->tipo->nombre}}</td>
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
