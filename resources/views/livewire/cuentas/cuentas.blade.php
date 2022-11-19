<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('cuentas.create-cuenta')
            @livewire('movimientos.abono')
            @livewire('movimientos.retiros')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8">
                <div class="flex justify-center">
                    {{-- Input buscar --}}
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar cuenta') }}" />
                        <x-jet-input
                            class="block mt-1 w-full"
                            type="text"
                            wire:model="buscar"
                            placeholder="Buscar socio por Nº de cuenta"
                        />
                    </div>
                </div>

                <div class="container py-8 flex justify-center">
                    <div class="overflow-x-auto w-5/6">
                        <table class="table table-zebra w-full">
                          <thead>
                            <tr>
                                <th># Cuenta</th>
                                <th>Socio</th>
                                <th>Tipo de Cuenta</th>
                                <th>Saldo Actual</th>
                                <th>Plazo</th>
                                <th>Proceso</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($cuentas as $cuenta)
                                <tr>
                                    <td> <b>{{ $cuenta->id}}</b></td>
                                    <td>
                                        {{ $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}
                                    </td>
                                    <td><b>{{ $cuenta->tipoCuenta->nombre }}</b></td>
                                    <td class="text-green">${{ $cuenta->saldo_actual }}</td>
                                    <td><b>{{ $cuenta->quincena_actual }}@if($cuenta->quincena_actual != null)/@else NO APLICA @endif{{ $cuenta->cantidad_quincenas }} </b> </td>
                                    <td class="font-bold text-center">
                                    <span style="@if ($cuenta->finalizado == 1) color: green; @else color: orange; @endif">
                                    {{ $cuenta->finalizado ? 'Finalizado' : 'Ejecución' }}
                                    </span>
                                  </td>
                                    <td>{{ $cuenta->estado ? 'Activo' : 'Inactivo' }}</td>

                                    <td>
                                        <a href="{{ route('ver.cuenta', $cuenta->id) }}" class="a-link">
                                            ver cuenta
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="m-4">
                    {{$cuentas->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
