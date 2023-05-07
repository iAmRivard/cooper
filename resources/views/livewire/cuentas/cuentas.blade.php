<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('cuentas.create-cuenta')
            @livewire('movimientos.abono')
            @livewire('movimientos.retiros')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="py-8 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex justify-center">
                    {{-- Input buscar --}}
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar cuenta') }}" />
                        <x-jet-input class="block w-full mt-1" type="text" wire:model="buscar"
                            placeholder="Buscar socio por Nº de cuenta" />
                    </div>
                </div>

                <div class="w-full m-4 md:w-5/6">
                    <table class="table w-full text-sm table-zebra md:text-base">
                        <thead>
                            <tr>
                                <th class="px-4"># Cuenta</th>
                                <th class="px-4">Socio</th>
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
                                <td class="px-4"> <b>{{ $cuenta->id}}</b> - {{ $cuenta->no_cuenta}} </td>
                                <td class="max-w-xs px-4 md:max-w-sm">
                                    <div class="truncate">
                                        {{ $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}
                                    </div>
                                </td>
                                <td class="px-4"><b>{{ $cuenta->tipoCuenta->nombre }}</b></td>
                                <td class="px-4">
                                    {{ $cuenta->pago_quincenal != null ? '$'.$cuenta->pago_quincenal : 'N/A' }}</td>
                                <td class="px-4 text-green">${{ $cuenta->saldo_actual }}</td>
                                <td class="px-4 font-bold text-center">
                                    <span
                                        class="@if ($cuenta->finalizado == 1) text-green-600 @else text-yellow-600 @endif">
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
                </div>
                <div class="m-4">
                    {{$cuentas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
