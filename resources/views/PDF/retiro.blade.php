@extends('layouts.pdf')

@section('content')

@include('PDF.partials.head')

<table class="table table-borderless">
    <tbody>
        <tr>
            <td>
                <img src="{{ asset('logo.svg') }}" alt="" height="50px" class="img-fluid">
            </td>
            <td>
                <h4 class="text-center">Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers
                    Impresores de R.L.</h4>
            </td>
        </tr>
        <tr></tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td><strong>RECIBO DE PAGO No.</strong> </td>
            <td>{{ $retiro->id }}</td>
            <td>{{ $retiro->cuenta->tipoCuenta->nombre }}</td>
            <td>{{ $retiro->created_at->format('d-m-Y')}}</td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td><strong>POR: </strong></td>
            <td>${{ number_format($retiro->monto, 2) }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>NOMBRE: </strong></td>
            <td>{{ $retiro->cuenta->socio->nombres }} {{ $retiro->cuenta->socio->apellidos }}
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td>RECIBI CONFORME: </td>
            <td> _____________________ </td>
            <td>PAGADO POR: </td>
            <td> _____________________ </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">FIRMA</td>
            <td></td>
            <td style="text-align: center;">{{ Auth::user()->id }}</td>
        </tr>
    </tbody>
</table>

<table class="table table-borderless">
    <tbody>
        <tr>
            <td>
                <img src="{{ asset('logo.svg') }}" alt="" height="50px" class="img-fluid">
            </td>
            <td>
                <h4 class="text-center">Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers
                    Impresores de R.L.</h4>
            </td>
        </tr>
        <tr></tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td><strong>RECIBO DE PAGO No.</strong> </td>
            <td>{{ $retiro->id }}</td>
            <td>{{ $retiro->cuenta->tipoCuenta->nombre }}</td>
            <td>{{ $retiro->created_at->format('d-m-Y')}}</td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td><strong>POR: </strong></td>
            <td>${{ number_format($retiro->monto, 2) }}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>NOMBRE: </strong></td>
            <td>{{ $retiro->cuenta->socio->nombres }} {{ $retiro->cuenta->socio->apellidos }}
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<table class="table table-borderless">
    <tbody>
        <tr>
            <td>RECIBI CONFORME: </td>
            <td> _____________________ </td>
            <td>PAGADO POR: </td>
            <td> _____________________ </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;">FIRMA</td>
            <td></td>
            <td style="text-align: center;">{{ Auth::user()->id }}</td>
        </tr>
    </tbody>
</table>
@endsection
