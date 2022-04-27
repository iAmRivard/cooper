<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


</head>
<body>

    <h1>Comprobante de abono</h1>
    <hr>

    <div class="content">
        <h3>Monto: <span>{{ number_format($abono->monto, 2)}}</span></h3>
        <h3>Cuenta: <span>{{ $abono->cuenta->no_cuenta}}</span></h3>
        <h3>Tipo: <span>{{ $abono->tipo->nombre }}</span></h3>
        <h3>Concepto: <span>{{ $abono->concepto }}</span></h3>
        <h3>Fecha: <span>{{ $abono->created_at->format('d-m-Y')}}</span></h3>
    </div>

    <style>
        .content{
            display: flex;
        }

        .content h3 {
            justify-content: center;
        }

    </style>


</body>
</html>
