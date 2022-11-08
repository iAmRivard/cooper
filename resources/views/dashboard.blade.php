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
            {{-- Cuentas de ahorro --}}
            <div>
                <div class="mx-4 my-2">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Cuentas de ahorro
                    </h2>
                </div>
                <div class="flex flex-col sm:flex-row">
                @foreach ($socio->cuentas as $cuenta)
                <a href="{{ route('cuenta.detalle', $cuenta->id) }}">
                    <div class="card w-96 sm:w-1/2 mx-4 my-2 bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">${{ $cuenta->saldo_actual }}</h2>
                            <p>
                                <a href="{{ route('ver.cuenta', $cuenta->id) }}" class="a-link">{{ $cuenta->tipoCuenta->nombre }} </a>
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
                </div>
            </div>
                {{-- Cresitos --}}
                @if (count($socio->creditos) >= 1)
                <div>
                    <div class="mx-4 my-2">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Creditos
                        </h2>
                    </div>
                    <div class="flex flex-col sm:flex-row">
                        @foreach ($socio->creditos as $credito)
                        <div class="card w-96 sm:w-1/2 mx-4 my-2 bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title">${{ $credito->monto }}</h2>
                                <p>{{ $credito->tipoCredito->nombre }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
