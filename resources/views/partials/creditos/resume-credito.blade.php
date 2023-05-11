<div class="flex justify-center m-4 mt-4">
    <div class="grid grid-cols-1 gap-4 p-6 rounded-md shadow-lg sm:grid-cols-2 stats">
        <div class="stat">
            <div class="text-sm text-gray-500">Crédito</div>
            <div class="text-xl font-bold text-primary">#{{$credito->id}}</div>
            <div class="text-xs">{{$credito->tipoCredito->nombre}}</div>
        </div>
        <div class="stat">
            <div class="text-sm text-gray-500">Monto otorgado</div>
            <div class="text-xl font-bold text-green-900">${{number_format($credito->monto, 2)}}</div>
        </div>
        <div class="stat">
            <div class="text-sm text-gray-500">Cuota</div>
            <div class="text-xl font-bold text-rose-900">${{$credito->cuotaFija()->cuota_fija}}</div>
        </div>
        <div class="stat">
            <div class="text-sm text-gray-500">Saldo a la fecha</div>
            <div class="text-xl font-bold text-sky-900">${{number_format($credito->saldo_actual, 2)}}
            </div>
        </div>
        <div class="stat">
            <div class="text-sm text-gray-500">Cuotas</div>
            <div class="text-xl font-bold text-sky-900">
                {{ $credito->cuota_actual}}/{{ $credito->cantidad_cuotas}}
            </div>
        </div>
        <div class="stat">
            <div class="text-sm text-gray-500">Interés Quincenal</div>
            <div class="text-xl font-bold text-rose-900">{{ $credito->porcentaje_interes}}%</div>
        </div>
        <div class="stat">
            <div class="text-xl font-bold">{{$credito->socio->nombres}}</div>
            <div class="text-sm text-gray-500">{{$credito->socio->apellidos}}</div>
        </div>
        <div class="stat">
            <div class="text-xl font-bold @if($credito->estado == 0) text-rose-900 @endif">
                {{ $credito->estado == 1 ? 'Activado' : 'Desactivado' }}
            </div>
            <div class="text-sm text-gray-500">Estado</div>
        </div>
    </div>

</div>

<div class="flex justify-center m-4 mt-4">
    <div class="text-xl font-bold text-secondary"> {{$credito->comentarios}}</div>
</div>

