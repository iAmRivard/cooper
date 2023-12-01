<table>
    <thead>
        <tr>
            <th>CODIGO EMPLEADO</th>
            <th>NUMERO SOCIO</th>
            <th>SOCIO</th>
            <th>CUOTA QUINCENAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuotas as $cuota)
            <tr>
                <td>{{ $cuota->codigo_empleado }}</td>
                @php
                    $socio = \App\Models\Crm_socios::where('codigo_empleado', $cuota->codigo_empleado)->first();
                @endphp
                <th>{{ $socio->numero_socio ?? '' }}</th>
                <td>{{ $cuota->socio }}</td>
                <td>{{ $cuota->cuota_quincenal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
