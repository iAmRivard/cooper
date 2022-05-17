<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .table thead {
            border: 1px solid black;
        }

    </style>

</head>
<body>

    <table>
        <td><img src="{{asset('/logo.svg')}}" alt="logo" height="150px"></td>
        <td>
            <h3>Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers Impresores de R.L.</h3>
        </td>
    </table>

    <br>

    <div>
        <strong>Fecha</strong> {{ $abono->created_at->format('d-m-Y')}}
    </div>
    <div>
        <strong>Recibo #</strong> {{ $abono->id }}
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Cuenta</th>
                <th>Nombres</th>
                <th>Apelldios</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>{{ $abono->cuenta->socio->id }}</td>
                <td>{{ $abono->cuenta->no_cuenta }}</td>
                <td>{{ $abono->cuenta->socio->nombres }}</td>
                <td>{{ $abono->cuenta->socio->apellidos }}</td>
            </tr>
        </tfoot>
    </table>

    <h1>Comprobante de abono</h1>
    <hr>

    <div class="container">
        <div class="content">
            <h3>Monto: <span>{{ number_format($abono->monto, 2)}}</span></h3>
            <h3>Cuenta: <span>{{ $abono->cuenta->no_cuenta}}</span></h3>
            <h3>Tipo: <span>{{ $abono->tipo->nombre }}</span></h3>
            <h3>Concepto: <span>{{ $abono->concepto }}</span></h3>
            <h3>Fecha: <span>{{ $abono->created_at->format('d-m-Y')}}</span></h3>
        </div>
    </div>



</body>
</html>
