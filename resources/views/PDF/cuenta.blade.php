<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>{{ $title }}</h1>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Concepto</th>
                <th>Concepto</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($cuenta->movimientos as $movimiento)
                <tr>
                    <td>{{ $movimiento->created_at }}</td>
                    <td>{{ $movimiento->tipo->nombre }}</td>
                    <td>{{ $movimiento->concepto }}</td>

                    <td> {{ $movimiento->naturaleza == 1 ? 'Abono' : 'Retiro' }}</td>
                    <td>${{ number_format($movimiento->monto, 2) }}</td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>

    </table>



</body>
</html>
