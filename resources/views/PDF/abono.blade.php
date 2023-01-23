@extends('layouts.pdf')

@section('content')

@include('PDF.partials.head')

<table class="table table-borderless">
    <tbody>
        <tr>
            <td><strong>TRANSACCION No. </strong> #{{ $abono->id }} - {{ $abono->tipo->nombre}} </td>
            <td></td>
            <td> <strong>T.CUENTA:</strong>  {{ $abono->cuenta->tipoCuenta->nombre }}</td>
            <td>{{ $abono->created_at->format('d-m-Y')}}</td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless table-sm">
    <tbody>
        <tr>
            <td><strong>POR: </strong></td>
            <td>${{ number_format($abono->monto, 2) }} A CUENTA #{{$abono->cuenta->no_cuenta}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>NOMBRE: </strong></td>
            <td>{{ $abono->cuenta->socio->nombres }} {{ $abono->cuenta->socio->apellidos }}
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>CONCEPTO: </strong></td>
            <td>{{ $abono->concepto }}
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
<hr/>
<!-- SEGUNDA TABLA (REPETICION)-->
@include('PDF.partials.head')

<table class="table table-borderless">
    <tbody>
        <tr>
            <td><strong>TRANSACCION No. </strong> #{{ $abono->id }} - {{ $abono->tipo->nombre}}</td>
            <td></td>
            <td> <strong>T.CUENTA:</strong>  {{ $abono->cuenta->tipoCuenta->nombre }}</td>
            <td>{{ $abono->created_at->format('d-m-Y')}}</td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless table-sm">
    <tbody>
        <tr>
            <td><strong>POR: </strong></td>
            <td>${{ number_format($abono->monto, 2) }} A CUENTA #{{$abono->cuenta->no_cuenta}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>NOMBRE: </strong></td>
            <td>{{ $abono->cuenta->socio->nombres }} {{ $abono->cuenta->socio->apellidos }}
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>CONCEPTO: </strong></td>
            <td>{{ $abono->concepto }}
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

<small>Generado por: {{ Auth::user()->name }}</small>

@endsection
