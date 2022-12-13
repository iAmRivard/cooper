<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('creditos.activar-desactivar', ['credito' => $credito])
            {{-- @if (count($movimientos) == 1)
                <label for="my-modal-5" class="open-moda-lable">open modal</label>
            @endif --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-center mb-4 mt-4">
                    <div class="stats shadow">
                        <div class="stat">
                            <div class="stat-title">Crédito </div>
                            <div class="stat-value text-primary">#{{$credito->id}}</div>
                            <div class="stat-desc">{{$credito->tipoCredito->nombre}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Monto otorgado</div>
                            <div class="stat-value text-green-900">${{number_format($credito->monto, 2)}}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title">Saldo a la fecha</div>
                            <div class="stat-value text-sky-900">${{number_format($credito->saldo_actual, 2)}}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Cuotas</div>
                            <div class="stat-value text-sky-900"> {{ $credito->cuota_actual}}/{{ $credito->cantidad_cuotas}}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Tasa Interés</div>
                            <div class="stat-value text-rose-900"> {{ $credito->porcentaje_interes}}%</div>
                        </div>

                        <div class="stat">
                            <div class="stat-value">{{$credito->socio->nombres}}</div>
                            <div class="stat-title">{{$credito->socio->apellidos}}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-value @if($credito->estado == 0) text-rose-900 @endif" >{{ $credito->estado == 1 ? 'Activado' : 'Desactivado' }}</div>
                            <div class="stat-title">Estado</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <table class="table table-zebra">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Concepto</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movimientos as $movimiento)
                            <tr>
                                <td class="text-center">{{ $movimiento->id }}</td>
                                <td class="text-center font-bold">{{$movimiento->tipoMovimiento->nombre}}</td>
                                <td class="text-center">{{ $movimiento->descripcion }}</td>
                                <td class="font-bold text-center" >
                                   <span style="@if ($movimiento->tipoMovimiento->naturaleza == 0) color: green; @else color: red; @endif">
                                        ${{ number_format($movimiento->monto,2) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $movimiento->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$movimientos->links()}}
            </div>
        </div>
    </div>

    <input type="checkbox" id="my-modal-5" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <form action="" method="post" id="edit-credito">
                <div class="flex gap-4">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">monto</span>
                        </label>
                        <input type="text" placeholder="Monto del credito" class="input input-bordered w-full" value="{{ number_format($credito->monto, 2) }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Cuota Fija</span>
                        </label>
                        <input type="text" placeholder="Cuota fija" class="input input-bordered w-full" value="{{ number_format($credito->cuotaFija()->cuota_fija, 2) }}" />
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Periodo</span>
                        </label>
                        <input type="text" placeholder="Periodo en quincenas" class="input input-bordered w-full" value="{{ $credito->cantidad_cuotas }}" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Porcenaje</span>
                        </label>
                        <input type="text" placeholder="Porcentaje de interes" class="input input-bordered w-full" value="{{ number_format($credito->porcentaje_interes, 2) }}" />
                    </div>
                </div>
            </form>
            <div class="modal-action">
                <label for="my-modal-5" class="btn">Cancelar!</label>
                <button class="btn">Editar</button>
            </div>
        </div>
    </div>
</div>

