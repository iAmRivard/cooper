<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>
                    <img src="{{ asset('logo.svg') }}" alt="" height="50px" >
                </td>
                <td>
                    <h4 class="text-center">Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers Impresores de R.L.</h4>
                </td>
            </tr>
            <tr></tr>
        </tbody>
    </table>
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
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td>
                    <img src="{{ asset('logo.svg') }}" alt="" height="50px" >
                </td>
                <td>
                    <h4 class="text-center">Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers Impresores de R.L.</h4>
                </td>
            </tr>
            <tr></tr>
        </tbody>
    </table>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>
