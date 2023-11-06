@include('PDF.partials.head')

<table class="table table-borderless table-sm">
    <tbody>
        <tr>
            <td><strong> No.{{ $retiro->id }}</strong> - {{ $retiro->tipoMovimiento->nombre }} </td>
            <td>#{{ $retiro->credito->no_cuenta}} </td>
            <td> <strong>T.C</strong> {{ $retiro->credito->tipoCredito->nombre }}</td>
            <td>{{ $retiro->created_at->format('d-m-Y')}}</td>
        </tr>
        <td><strong>Monto:</strong> ${{ $retiro->credito->monto }}</td>
        <td><strong>Actual:</strong> ${{ $retiro->credito->saldo_actual }}</td>
        <td><strong>C. Fija: </strong> ${{ $retiro->credito->cuotaFija()->cuota_fija ?? '' }}</td>
        <td></td>
    </tbody>
</table>
<table class="table table-borderless table-sm">
    <tbody>
        <tr>
            <td><strong>POR: </strong></td>
            <td>${{ number_format($retiro->monto, 2) }}</td>
            <td>Socio #</td>
            <td>{{ $retiro->cuenta->socio->numero_socio ?? '' }}</td>
        </tr>
        <tr>
            <td><strong>NOMBRE: </strong></td>
            <td>{{ $retiro->socio->nombres }} {{ $retiro->socio->apellidos }}
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>CONCEPTO: </strong></td>
            <td>{{ $retiro->descripcion }}
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td>RECIBIDO POR: </td>
            <td> _____________________ </td>
            <td>PAGADO POR: </td>
            <td> _____________________ </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">FIRMA</td>
            <td></td>
            <td style="text-align: center;">FIRMA</td>
        </tr>
    </tbody>
</table>
<hr>
