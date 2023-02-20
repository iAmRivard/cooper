<table>
    <thead>
        <tr>
            <th>CODIGO EMPLEADO</th>
            <th>SOCIO</th>
            <th>APORTACION</th>
            <th>AHORRO QUINCENAL VISTA</th>
            <th>AHORRO QUINCENAL NAVIDENO</th>
            <th>AHORRO QUINCENAL PROGRAMADO</th>
            <th>AHORRO QUINCENAL PROGRAMADO</th>
            <th>CUOTA PRESTAMO</th>
            <th>INTERES PRESTAMO</th>
            <th>INTERES PRESTAMO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuotas as $cuota)
            <tr>
                <td>{{ $cuota->codigo_empleado }}</td>
                <td>{{ $cuota->socio }}</td>
                <td>{{ $cuota->APORTACION }}</td>
                <td>{{ $cuota->AHORRO_QUINCENAL_VISTA }}</td>
                <td>{{ $cuota->AHORRO_QUINCENAL_NAVIDENO }}</td>
                <td>{{ $cuota->AHORRO_QUINCENAL_PROGRAMADO }}</td>
                <td>{{ $cuota->DESCUENTO_QUINCENAL }}</td>
                <td>{{ $cuota->CUOTA_PRESTAMO }}</td>
                <td>{{ $cuota->INTERES_PRESTAMO }}</td>
                <td>{{ $cuota->CAPITAL_PRESTAMO }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
