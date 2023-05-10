<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if (Auth::user()->rol == 'socio')
                <div class="sm:flex sm:justify-around flex flex-col items-center justify-center">
                    {{-- Cuentas de ahorro --}}
                    <div class="sm:w-full">
                        <div class="mx-4 my-2">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Cuentas de ahorro
                            </h2>
                        </div>
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 mb-4">
                            @foreach ($socio->cuentas as $cuenta)
                            <a href="{{ route('cuenta.detalle', $cuenta->id) }}" class="sm:w-full">
                                <div class="card w-100 sm:mx-4 sm:my-2 mx-2 my-1 bg-base-100 shadow-xl">
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
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                Creditos
                            </h2>
                        </div>
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 mb-4">
                            @foreach ($socio->creditos as $credito)
                            <a href="{{ route('credito.detalle', $credito->id) }}" class="sm:w-full">
                                <div class="card w-100 sm:mx-4 sm:my-2 mx-2 my-1 bg-base-100 shadow-xl">
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
