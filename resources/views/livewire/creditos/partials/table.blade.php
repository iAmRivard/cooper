<table class="table w-full text-sm table-zebra md:text-base">
    <thead>
        <tr>
            <th># Empleado</th>
            <th># Socio</th>
            <th>Socio</th>
            <th># Credito</th>
            <th>Tipo de Credito</th>
            <th>Monto</th>
            <th>Saldo Actual</th>
            <th># Cuotas</th>
            <th>Estado</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($creditos as $credito)
        <tr>
            <td>{{ $credito->socio->codigo_empleado }}</td>
            <td>{{ $credito->socio->numero_socio ?? 'N/A' }}</td>
            <td class="font-bold">
                {{ $credito->socio->nombres . " " . $credito->socio->apellidos }}
            </td>
            <td>{{$credito->id}}/<strong>{{ $credito->no_cuenta}}</strong></td>
            <td class="font-bold">{{ $credito->tipoCredito->nombre }}</td>
            <td>${{ $credito->monto }}</td>
            <td>${{ $credito->saldo_actual }}</td>
            <td class="font-bold"> {{ $credito->cuota_actual}}/{{ $credito->cantidad_cuotas}} </td>
            <td>{{ $credito->estado ? 'Activo' : 'Inactivo' }}</td>
            <td>
                <a href="{{ route('ver.credito', $credito->id) }}" class="a-link btn btn-sm">
                    Detalles
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
