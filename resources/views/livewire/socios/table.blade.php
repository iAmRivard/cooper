<div>
    <div class="flex">
        <div class="mb-4 mx-2">
            <x-jet-label value="Desde" />
            <input
                type="date"
                class="input input-bordered"
                wire:model="desde"
            >
        </div>
        <div class="mb-4 mx-2">
            <x-jet-label value="Hasta" />
            <input
                type="date"
                class="input input-bordered"
                wire:model="hasta"
            >
        </div>

        <div class="mb-4 mx-2">
            <x-jet-label value="Cuenta" />
            <select
                class="select select-bordered"
                wire:model="cuenta"
            >
                <option value="">Selección de cuenta</option>
                @foreach ($socio->cuentas as $cuenta)
                <option value="{{$cuenta->id}}">
                    {{$cuenta->no_cuenta}}
                </option>
                @endforeach
            </select>
        </div>



        <div class="mb-4 mt-6">
            <x-jet-button
                wire:click="buscar"
            >
                Buscar
            </x-jet-button>
        </div>
        <div class="mb-4 mt-6 ml-2">

            @livewire('beneficiarios.crear',['socio' => $socio])
        </div>

    </div>

    <div class="flex justify-center">

        @if ($mov)

            <table class="table table-zebra w-5/6 mb-8">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Referencia</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mov as $movimiento)
                    <tr>
                        <td>{{$movimiento->tipo->nombre}}</td>
                        <td>{{$movimiento->concepto}}</td>
                        <td>${{$movimiento->monto}}</td>
                        <td>{{$movimiento->id}}</td>
                        <td>{{$movimiento->created_at}}</td>
                        <td></td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        @endif


    </div>
</div>
