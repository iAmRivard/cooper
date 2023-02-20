<table>
    <thead>
        <tr>
            <th>PREFIJO</th>
            <th>TIPO</th>
            <th>SOCIO</th>
            <th>CODIGO EMPLEADO</th>
            <th>NÚMERO CUENTA</th>
            <th>TIPO CUENTA</th>
            <th>PAGO QUINCENAL</th>
            <th>NÚMERO CUOTA</th>
            <th>ID SOCIO</th>
            <th>INTERES</th>
            <th>CUOTA CAPITAL</th>
            <th>PLAN PAGO DET</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuotas as $cuota)
            <tr>
                <td>{{ $cuota->prefijo }}</td>
                <td>{{ $cuota->tipo }}</td>
                <td>{{ $cuota->socio }}</td>
                <td>{{ $cuota->codigo_empleado }}</td>
                <td>{{ $cuota->no_cuenta }}</td>
                <td>{{ $cuota->tipo_cuenta }}</td>
                <td>{{ $cuota->pago_quincenal }}</td>
                <td>{{ $cuota->nr_cuota }}</td>
                <td>{{ $cuota->id_socio }}</td>
                <td>{{ $cuota->interes }}</td>
                <td>{{ $cuota->cuota_capital }}</td>
                <td>{{ $cuota->id_plan_pago_det }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
