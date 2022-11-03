<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('creditos.crear-credito')
            @livewire('creditos.abono')
            {{-- @livewire('movimientos.retiros') --}}

        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8">

                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar Crédito') }}" />
                        <x-jet-input
                            class="block mt-1 w-full"
                            type="text"
                            wire:model="buscar"
                            placeholder="Buscar socio por Nº de credito"
                        />
                    </div>
                </div>


                <div class="container py-8 flex justify-center">
                    <div class="overflow-x-auto w-5/6">
                        <table class="table table-zebra w-full">
                          <!-- head -->
                          <thead>
                            <tr>
                                <th># Credito</th>
                                <th>Socio</th>
                                <th>Tipo de Credito</th>
                                <th>Monto</th>
                                <th>Saldo Actual</th>
                                <th>Interes</th>
                                <th># Cuotas</th>
                                <th>Estado</th>
                                <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($creditos as $credito)
                                <tr>
                                    <td>{{ $credito->id}}</td>
                                    <td class="font-bold">
                                        {{ $credito->socio->nombres . " " . $credito->socio->apellidos }}
                                    </td>
                                    <td class="font-bold">{{ $credito->tipoCredito->nombre }}</td>
                                    <td>${{ $credito->monto }}</td>
                                    <td>${{ $credito->saldo_actual }}</td>
                                    <td>{{ $credito->porcentaje_interes}}% </td>
                                    <td class="font-bold"> {{ $credito->cuota_actual}}/{{ $credito->cantidad_cuotas}} </td>
                                    <td>{{ $credito->estado ? 'Activo' : 'Inactivo' }}</td>

                                    <td>
                                        <a href="{{ route('ver.credito', $credito->id) }}" class="a-link">
                                            Detalles
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-6 py-3 flex justify-items-center justify-around">
                    {{$creditos->links()}}
                </div>

            </div>

        </div>

    </div>

</div>
