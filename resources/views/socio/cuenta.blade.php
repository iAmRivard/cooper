<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de cuenta') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-screen-xl mx-auto">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

            <div class="flex flex-col space-y-4 sm:space-y-0 sm:flex-row sm:space-x-4 mb-4">
                <div class="flex-1 p-4 shadow rounded">
                    <div class="stat-title">Numero de cuenta </div>
                    <div class="stat-value text-primary">#{{$cuenta->id}}</div>
                    <div class="stat-desc">{{$cuenta->tipoCuenta->nombre}}</div>
                </div>
                @if ($cuenta->tipoCuenta->plazo)
                <div class="flex-1 p-4 shadow rounded">
                    <div class="stat-title">Monto Apertura</div>
                    <div class="stat-value text-sky-900">${{number_format($cuenta->monto_plazo)}}</div>
                    <div class="stat-desc">MONTO INICIAL</div>
                </div>
                @endif
                <div class="flex-1 p-4 shadow rounded">
                    <div class="stat-title">Saldo a la fecha</div>
                    <div class="stat-value text-green-900">${{number_format($cuenta->saldo_actual, 2)}}</div>
                    <div class="stat-desc">
                        @if ($cuenta->tipoCuenta->plazo)
                        MONTO INICIAL + INTERESES
                        @else
                        MONTO INICIAL + ABONOS/INTERESES
                        @endif
                    </div>
                </div>
                @if ($cuenta->tipoCuenta->plazo)
                <div class="flex-1 p-4 shadow rounded">
                    <div class="stat-title">{{$cuenta->finalizado ? 'Finalizado' : 'Ejecución'}}</div>
                    <div class="stat-value">{{ $cuenta->quincena_actual }}@if($cuenta->quincena_actual != null)/@else / @endif{{ $cuenta->cantidad_quincenas }}</div>
                    <div class="stat-desc">CUOTAS</div>
                </div>
                @endif
            </div>
            <div class="flex flex-col overflow-x-auto">
    @foreach($cuenta->mv as $detalle)
        <div class="bg-white shadow overflow-hidden sm:rounded-lg my-2 cursor-pointer" onclick="openModal('modal{{ $detalle->id }}')">
            <div class="px-4 py-5 sm:px-6 flex justify-between">
                <div class="text-sm leading-6 font-medium text-gray-900">
                <span class="text-sm @if($detalle->tipo->naturaleza == 1) text-green-600 @else text-red-600 @endif">
                        ${{ number_format($detalle->monto, 2) }}
                    </span>
                    | {{ $detalle->tipo->nombre }} 
               
                </div>
                <div class="text-sm text-gray-500">{{ date_format($detalle->created_at, 'd/m/Y') }}</div>
            </div>
        </div>
        <div id="modal{{ $detalle->id }}" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Detalles del movimiento
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                <strong>Concepto:</strong> {{ $detalle->concepto }}<br>
                                <strong>Monto:</strong> ${{ number_format($detalle->monto, 2) }}<br>
                                <strong>Saldo a la fecha:</strong> ${{ number_format($detalle->saldo_fecha, 2) }}<br>
                                <strong>Tipo:</strong> {{ $detalle->tipo->nombre }}<br>
                                <strong>Fecha:</strong> {{ date_format($detalle->created_at, 'd/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal('modal{{ $detalle->id }}')">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

    @endforeach

</div>


        </div>
        
    </div>
    
</div>


<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
</x-app-layout>
