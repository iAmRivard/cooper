<div class="overflow-x-auto">
    <table class="table table-zebra">
        <!-- head -->
        <thead>
            <tr>
                <th><b>Periodo</b></th>
                <th>Monto</th>
                <th>Interes</th>
                <th>Capital</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tablaAmor as $t)
            <tr>
                <th>{{ $t['quincena'] }}</th>
                <td>{{ $t['monto'] }}</td>
                <td>{{ $t['interes'] }}</td>
                <td>{{ $t['capital'] }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            Perido: Mensual para plazos fijos, Quincenal para ahorro programado ó navideño.
        </tfoot>
    </table>
</div>
