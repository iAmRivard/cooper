<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-activar-desactivar-cuenta :id="$cuenta->id" :status="$cuenta->estado" />
            <x-change-number-accunt :id="$cuenta->id" :number="$cuenta->no_cuenta" />
            {{-- <x-eddit-discount :id="$cuenta->id" :discount="$cuenta->pago_quincenal" /> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                @include('partials.cuentas.resume-cuenta')

                @if ($cuenta->tipoCuenta->plazo == true)
                    <div class="flex justify-center gap-4 mt-4 mb-4">
                        {{-- fecha de inicio --}}
                        <div class="shadow stats">
                            <div class="stat">
                                <div class="stat-title">Fecha de inicio</div>
                                <div class="stat-value">{{ $cuenta->fecha_inicio }}</div>
                            </div>
                        </div>
                        {{-- Fecha fin --}}
                        <div class="shadow stats">
                            <div class="stat">
                                <div class="stat-title">Fecha fin</div>
                                <div class="stat-value">{{ $cuenta->fecha_fin }}</div>
                            </div>
                        </div>
                    </div>
                @endif

                @include('partials.cuentas.table-movimientos')

                @isset($tablaAmor)
                    <div class="flex justify-center m-4">
                        @include('cuentas.tabla-amortizacion')
                    </div>
                @endisset
            </div>
        </div>
    </div>
</x-app-layout>
