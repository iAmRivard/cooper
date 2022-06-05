<div>
    <div class="flex">
        <div class="mb-4">
            <x-jet-label value="Desde" />
            <x-jet-input
                type="date"
                wire:model="desde"
            />
            {{$desde}}
        </div>
        <div class="mb-4 mx-2">
            <x-jet-label value="Hasta" />
            <x-jet-input
                type="date"
                wire:model="hasta"
            />

            {{$hasta}}
        </div>

        <div class="mb-4 mt-6">
            <x-jet-button
                wire:click="buscar"
            >
                Buscar
            </x-jet-button>
        </div>
    </div>

    <div class="flex justify-center">

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

                {{-- {{dd($socio)}} --}}

                {{-- @foreach ($socio_cuentas->movimientos as $movimiento)
                            <tr>
                                <td>
                                    {{ $movimiento }}
                </td>


                </tr>
                @endforeach --}}

            </tbody>

        </table>

    </div>
</div>
