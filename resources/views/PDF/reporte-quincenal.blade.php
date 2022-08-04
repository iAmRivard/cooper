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

    <div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Asociación Cooperativa de Ahorro y Credito de Empleados de Algiers Impresores de R.L.</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="d-flex justify-content-around">
        <span>
            <strong>Recibo #</strong>
        </span>
        <span>
            <strong>Fecha</strong> {{ $fecha }}
        </span>
    </div>

    <div class="text-center">
        <table class="table tableFixHead">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col text-center">Codigo</th>
                    <th scope="col text-center">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row text-center">Recibi de:</th>
                    <td class="text-center">{{ $socio->id }}</td>
                    <td class="text-center">{{$socio->nombres}} {{ $socio->apellidos }}</td>
                </tr>
                <tr>
                    <th scope="row text-center">Cuota de ingreso: </th>
                    <td class="text-center">$$$$</td>
                    <td class="text-center"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Descuento quincenal</th>
                    <th scope="col text-center">Cantidad</th>
                    <th scope="col text-center">Saldo a la fecha</th>
                </tr>
            </thead>
            <tbody>
                @if (count($creditos) > 0)
                @foreach ($creditos as $item)
                {{-- <tr>
                    <th scope="row text-center">Prestamo {{  }}</th>
                    <td class="text-center">{{ $socio->id }}</td>
                    <td class="text-center">{{$socio->nombres}} {{ $socio->apellidos }}</td>
                </tr> --}}
                @endforeach
                @endif

                @if (count($abonos) > 0)
                @foreach ($abonos as $cuenta)
                <tr>
                    <th scope="row text-center">Ahorro</th>
                    <td class="text-center">{{ $socio->id }}</td>
                    <td class="text-center">{{$socio->nombres}} {{ $socio->apellidos }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>


    {{-- {{dd($socio)}} --}}

    {{-- <table class="table table-bordered">
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
                <td scope="row">{{ $data["socio"] }}</td>
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
    </div> --}}


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>
