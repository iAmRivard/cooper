<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (Auth::user()->rol == 'socio')
                    <div class="flex flex-col items-center justify-center sm:flex sm:justify-around">
                        {{-- Cuentas de ahorro --}}
                        <div class="sm:w-full">
                            <div class="mx-4 my-2">
                                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                    Cuentas de ahorro
                                </h2>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-4 lg:grid-cols-2">
                                @foreach ($socio->cuentas as $cuenta)
                                <a href="{{ route('cuenta.detalle', $cuenta->id) }}" class="sm:w-full">
                                    <div class="mx-2 my-1 shadow-xl card w-100 sm:mx-4 sm:my-2 bg-base-100">
                                        <div class="card-body">
                                            <h2 class="text-lg sm:text-xl">${{ $cuenta->saldo_actual }}</h2>
                                            <p class="text-sm sm:text-base">
                                                {{ $cuenta->tipoCuenta->nombre }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        {{-- Creditos --}}
                        @if (count($socio->creditos) >= 1)
                        <div class="sm:w-full">
                            <div class="mx-4 my-2">
                                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                                    Creditos
                                </h2>
                            </div>
                            <div class="grid grid-cols-1 gap-4 mb-4 lg:grid-cols-2">
                                @foreach ($socio->creditos as $credito)
                                <a href="{{ route('credito.detalle', $credito->id) }}" class="sm:w-full">
                                    <div class="mx-2 my-1 shadow-xl card w-100 sm:mx-4 sm:my-2 bg-base-100">
                                        <div class="card-body">
                                            <h2 class="text-lg sm:text-xl">${{ $credito->monto }}</h2>
                                            <p class="text-sm sm:text-base">
                                                {{ $credito->tipoCredito->nombre }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
