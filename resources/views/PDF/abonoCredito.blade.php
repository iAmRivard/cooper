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
            <td><strong>C. Fija: </strong> ${{ $retiro->credito->cuotaFija()->cuota_fija }}</td>
            <td></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless table-sm">
        <tbody>
            <tr>
                <td><strong>POR: </strong></td>
                <td>${{ number_format($retiro->monto, 2) }}</td>
                <td></td>
                <td></td>
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
    <!-- COMIENZA 2DA TABLA-->
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
            <td><strong>C. Fija: </strong>$ {{ $retiro->credito->cuotaFija()->cuota_fija }}</td>
            <td></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless table-sm">
        <tbody>
            <tr>
                <td><strong>POR: </strong></td>
                <td>${{ number_format($retiro->monto, 2) }}</td>
                <td></td>
                <td></td>
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

    <small>Generado por: {{ Auth::user()->name }}</small>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>
