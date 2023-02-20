<table>
    <thead>
        <tr>
            <th>CODIGO EMPLEADO</th>
            <th>SOCIO</th>
            <th>CUOTA QUINCENAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuotas as $cuota)
            <tr>
                <td>{{ $cuota->codigo_empleado }}</td>
                <td>{{ $cuota->socio }}</td>
                <td>{{ $cuota->cuota_quincenal }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
