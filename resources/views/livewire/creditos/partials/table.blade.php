<?php
    use Carbon\Carbon;
?>
<div class="overflow-x-auto">
    <table class="table table-xs table-zebra">
        <thead>
            <tr>
                <th># Empleado</th>
                <th># Socio</th>
                <th>Socio</th>
                <th># Credito</th>
                <th>Tipo de Credito</th>
                <th>Monto</th>
                <th>Saldo Actual</th>
                <th># Cuotas</th>
                <th>% Interes</th>
                <th>Cuota Fija</th>
                <th>Fecha Creación</th>
                <th>Estado</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($creditos as $credito)
            <tr>
                <td>{{ $credito->socio->codigo_empleado }}</td>
                <td>{{ $credito->socio->numero_socio ?? 'N/A' }}</td>
                <td class="font-bold">
                    {{ $credito->socio->nombres . " " . $credito->socio->apellidos }}
                </td>
                <td>{{$credito->id}}/<strong>{{ $credito->no_cuenta}}</strong></td>
                <td class="font-bold">{{ $credito->tipoCredito->nombre }}</td>
                <td>${{ $credito->monto }}</td>
                <td>${{ $credito->saldo_actual }}</td>
                <td class="font-bold"> {{ $credito->cuota_actual}}/{{ $credito->cantidad_cuotas}} </td>
                <td > {{ $credito->porcentaje_interes}} </td>
                <td class="font-bold"> ${{ $credito->cuotaFija()->cuota_fija ?? 0}} </td>
                <td class="font-bold"> {{ Carbon::parse($credito->created_at)->locale('es_ES')->format('d-m-Y')  }} </td>
                <td>{{ $credito->estado ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <a href="{{ route('ver.credito', $credito->id) }}" class="a-link btn btn-sm btn-primary">
                        Detalles
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th># Empleado</th>
                <th># Socio</th>
                <th>Socio</th>
                <th># Credito</th>
                <th>Tipo de Credito</th>
                <th>Monto</th>
                <th>Saldo Actual</th>
                <th># Cuotas</th>
                <th># Cuotas</th>
                <th>Estado</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>
