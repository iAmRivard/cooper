<table class="table text-sm table-zebra md:text-base">
    <thead>
        <tr>
            <th class="px-4"># Empleado</th>
            <th class="px-4"># Socio</th>
            <th class="px-4">Socio</th>
            <th class="px-4"># Cuenta</th>
            <th class="px-4">Tipo de Cuenta</th>
            <th class="px-4">Cuota Quincenal</th>
            <th class="px-4">Saldo</th>
            <th class="px-4">Proceso</th>
            <th class="px-4">Estado</th>
            <th class="px-4">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuentas as $cuenta)
        <tr>
            <td>{{ $cuenta->socio->codigo_empleado }}</td>
            <td>{{ $cuenta->socio->numero_socio ?? 'N/A' }}</td>
            <td class="max-w-xs px-4 md:max-w-sm">
                <div class="truncate">
                    {{ $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}
                </div>
            </td>
            <td class="px-4">
                <b>{{ $cuenta->id}}</b> - {{ $cuenta->no_cuenta}}
            </td>
            <td class="px-4"><b>{{ $cuenta->tipoCuenta->nombre }}</b></td>
            <td class="px-4">
                {{ $cuenta->pago_quincenal != null ? '$'.$cuenta->pago_quincenal : 'N/A' }}
            </td>
            <td class="px-4 text-green">${{ $cuenta->saldo_actual }}</td>
            <td class="px-4 font-bold text-center">
                <span @if ($cuenta->finalizado == 1) class="text-green-600" @else class="text-yellow-600" @endif >
                    {{ $cuenta->finalizado ? 'Finalizado' : 'Ejecución' }}
                </span>
            </td>
            <td class="px-4">{{ $cuenta->estado ? 'Activo' : 'Inactivo' }}</td>

            <td class="px-4">
                <a href="{{ route('ver.cuenta', $cuenta->id) }}" class="text-sm a-link btn btn-sm">
                    ver cuenta
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
