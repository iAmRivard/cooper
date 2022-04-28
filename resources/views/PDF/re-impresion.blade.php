<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{$title}}</h1>
    <hr>

    <div class="container">
        <div class="content">
            <h3>Monto: <span>{{ number_format($transaccion->monto, 2)}}</span></h3>
            <h3>Cuenta: <span>{{ $transaccion->cuenta->no_cuenta}}</span></h3>
            <h3>Tipo: <span>{{ $transaccion->tipo->nombre }}</span></h3>
            <h3>Concepto: <span>{{ $transaccion->concepto }}</span></h3>
            <h3>Fecha: <span>{{ $transaccion->created_at->format('d-m-Y')}}</span></h3>
        </div>
    </div>

</body>
</html>
