<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>

    {{-- <style>
        .table thead {
            border: 1px solid black;
        }

    </style> --}}

</head>
<body>

    <div class="d-flex justify-content-around">
        <div>
            <img src="http://127.0.0.1:8000/logo.svg" alt="logo" height="150px" class="img-fluid">
        </div>
        <div>
            <h4 class="text-center">Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers Impresores de R.L.</h4>
        </div>
    </div>

    <div class="d-flex justify-content-around">
        <span>
            <strong>Fecha</strong> {{ $abono->created_at->format('d-m-Y')}}
        </span>
        <span>
            <strong>Recibo #</strong> {{ $abono->id }}
        </span>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apelldios</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">{{ $abono->cuenta->socio->id }}</td>
                <td>{{ $abono->cuenta->no_cuenta }}</td>
                <td>{{ $abono->cuenta->socio->nombres }}</td>
                <td>{{ $abono->cuenta->socio->apellidos }}</td>
            </tr>
        </tbody>
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


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>
