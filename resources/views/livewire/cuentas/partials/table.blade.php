<?php
    use Carbon\Carbon;
?>


<div class="overflow-x-auto">
    <table class="table table-xs table-zebra">
        <thead>
            <tr>
                <th>Cod empleado</th>
                <th># Socio</th>
                <th>Socio</th>
                <th># Cuenta</th>
                <th>Tipo de Cuenta</th>
                <th>Cuota Quincenal</th>
                <th>Saldo</th>
                <th>Proceso</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuentas as $cuenta)
                <tr>
                    <td>{{ $cuenta->socio->codigo_empleado }}</td>
                    <td>{{ $cuenta->socio->numero_socio ?? 'N/A' }}</td>
                    <td>
                        <div class="truncate">
                            {{ $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}
                        </div>
                    </td>
                    <td >
                        <b>{{ $cuenta->id}}</b> - {{ $cuenta->no_cuenta}}
                    </td>
                    <td>
                        <b>{{ $cuenta->tipoCuenta->nombre }}</b>
                    </td>
                    <td>
                        {{ $cuenta->pago_quincenal != null ? '$'.$cuenta->pago_quincenal : 'N/A' }}
                    </td>
                    <td class="text-green">${{ $cuenta->saldo_actual }}</td>
                    <td class="font-bold text-center">
                        <span @if ($cuenta->finalizado == 1) class="text-green-600" @else class="text-yellow-600" @endif >
                            {{ $cuenta->finalizado ? 'Finalizado' : 'Ejecución' }}
                        </span>
                    </td>
                    <td>{{ Carbon::parse($cuenta->created_at)->locale('es_ES')->format('d-m-Y') }}</td>
                    <td>{{ $cuenta->estado ? 'Activo' : 'Inactivo' }}</td>

                    <td>
                        <a href="{{ route('ver.cuenta', $cuenta->id) }}" class="text-sm btn btn-sm btn-primary">
                            ver cuenta
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
                <th># Cuenta</th>
                <th>Tipo de Cuenta</th>
                <th>Cuota Quincenal</th>
                <th>Saldo</th>
                <th>Proceso</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </tfoot>
    </table>
</div>
