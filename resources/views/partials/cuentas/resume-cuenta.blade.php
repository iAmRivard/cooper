<div class="flex justify-center mt-4 mb-4">
    <div class="grid grid-cols-1 gap-4 p-6 rounded-md shadow-lg sm:grid-cols-2 stats">
        <div class="stat">
            <div class="text-sm text-gray-500">Número de cuenta</div>
            <div class="text-xl font-bold text-primary">#{{$cuenta->no_cuenta}}</div>
            <div class="text-xs">{{$cuenta->tipoCuenta->nombre}}</div>
        </div>
        @if ($cuenta->tipoCuenta->plazo)
        <div class="stat">
            <div class="text-sm text-gray-500">Monto Apertura</div>
            <div class="text-xl font-bold text-sky-900">${{number_format($cuenta->monto_plazo)}}</div>
            <div class="text-xs">MONTO INICIAL</div>
        </div>
        @endif
        <div class="stat">
            <div class="text-sm text-gray-500">Saldo a la fecha</div>
            <div class="text-xl font-bold text-green-900">${{number_format($cuenta->saldo_actual, 2)}}</div>
            @if ($cuenta->tipoCuenta->plazo)
            <div class="text-xs">MONTO INICIAL + INTERESES</div>
            @else
            <div class="text-xs">MONTO INICIAL + ABONOS/INTERESES</div>
            @endif
        </div>
        <div class="stat">
            <div class="text-xl font-bold">{{$cuenta->socio->nombres}}</div>
            <div class="text-sm text-gray-500">{{$cuenta->socio->apellidos}}</div>
        </div>
        {{-- <div class="stat">
            <div class="text-sm text-gray-500">Descuento Quincenal</div>
            <div class="text-xl font-bold text-green-900">${{$cuenta->pago_quincenal}}</div>
        </div> --}}

        @if ($cuenta->tipoCuenta->plazo)
        <div class="stat">
            <div class="text-sm text-gray-500">{{$cuenta->finalizado ? 'Finalizado' : 'Ejecución'}}</div>
            <div
                class="text-xl font-bold text-sky-900">
                {{ $cuenta->quincena_actual }}@if($cuenta->quincena_actual != null)/ @else / @endif{{ $cuenta->cantidad_quincenas }}
            </div>
            <div class="text-xs">QUINCENAS</div>
        </div>
        @endif
    </div>
</div>
