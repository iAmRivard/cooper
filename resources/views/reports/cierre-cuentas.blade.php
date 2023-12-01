<table>
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellido</th>
            <th>DUI</th>
            <th>Empresa</th>
            <th>Tipo de cuenta</th>
            <th>Año</th>
            <th>Mes</th>
            <th>Porcentaje Anual</th>
            <th>Porcentaje Mensual</th>
            <th>Saldo Cierre</th>
            <th>Interes Generado</th>
            <th>Saldo Final</th>
            <th>Saldo Final Cierre</th>
            <th>NUMERO SOCIO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cierres as $cierre)
            <tr>
                <td>{{ $cierre->nombres }}</td>
                <td>{{ $cierre->apellidos }}</td>
                <td>{{ $cierre->dui }}</td>
                <td>{{ $cierre->empresa }}</td>
                <td>{{ $cierre->id_tipo_cuenta }}</td>
                <td>{{ $cierre->mombre_tipo_cuenta }}</td>
                <td>{{ $cierre->anio }}</td>
                <td>{{ $cierre->mes }}</td>
                <td>{{ $cierre->porcentaje_anual }}</td>
                <td>{{ $cierre->porcentaje_mensual }}</td>
                <td>{{ $cierre->saldo_cierre }}</td>
                <td>{{ $cierre->intereses_generados }}</td>
                <td>{{ $cierre->saldo_final }}</td>
                <td>{{ $cierre->saldo_final_cierre }}</td>

                @php
                    $socio = \App\Models\Crm_socios::where('dui', $cierre->dui)->first();
                @endphp
                <th>{{ $socio->numero_socio ?? '' }}</th>
            </tr>
        @endforeach
    </tbody>
</table>
