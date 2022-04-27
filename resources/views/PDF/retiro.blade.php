<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .container{
            display: flex;
        }

        .content{
            justify-content: center;
        }

    </style>

</head>
<body>

    <h1>{{ $title }}</h1>
    <hr>

    <div class="container">
        <div class="content">
            <h3>Monto: <span>{{ number_format($retiro->monto, 2)}}</span></h3>
            <h3>Cuenta: <span>{{ $retiro->cuenta->no_cuenta}}</span></h3>
            <h3>Tipo: <span>{{ $retiro->tipo->nombre }}</span></h3>
            <h3>Concepto: <span>{{ $retiro->concepto }}</span></h3>
            <h3>Fecha: <span>{{ $retiro->created_at->format('d-m-Y')}}</span></h3>
        </div>
    </div>



</body>
</html>
