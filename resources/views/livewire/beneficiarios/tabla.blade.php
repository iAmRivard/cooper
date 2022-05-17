<div>
    <table class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>parentesco</th>
                <th>Fecha de Nacimiento</th>
                <th>%</th>
                <th>Dirección</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($socio->beneficiarios as $item)
            <tr>
                <td>
                    {{ $item->nombres }}
                </td>
                <td>
                    {{ $item->apellidos }}
                </td>
                <td>
                    {{ $item->parentesco }}
                </td>
                <td>
                    {{ $item->fecha_nacimiento }}
                </td>
                <td>
                    {{ $item->porcentaje }}
                </td>
                <td>
                    {{ $item->direccion }}
                </td>
                <td>
                    <x-jet-button wire:click="editar( {{$item}} )">
                        Editar
                    </x-jet-button>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>


    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            {{ $beneficiario->nombres }} {{ $beneficiario->apellidos }}
        </x-slot>
        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label>Nombres</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="beneficiario.nombres" />
            </div>

            <div class="mb-4">
                <x-jet-label>Apellidos</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="beneficiario.apellidos" />
            </div>

            <div class="mb-4">
                <x-jet-label>Parentesco</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="beneficiario.parentesco" />
            </div>

            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label>Fecha de Nacimiento</x-jet-label>
                    <x-jet-input type="date" class="w-full" wire:model.defer="beneficiario.fecha_nacimiento" />
                </div>

                <div class="w-1/2 pl-4">
                    <x-jet-label>Porcentaje</x-jet-label>
                    <x-jet-input type="number" class="w-full" wire:model.defer="beneficiario.porcentaje" placeholder="%" />
                </div>
            </div>

            <div class="bm-4">
                <x-jet-label>Dirección</x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="beneficiario.direccion" />
            </div>

        </x-slot>
        <x-slot name="footer">

            @if ($error)
                <span>Porcentaje invalido</span>
            @endif

            <x-jet-button wire:click="actualizar">
                Actualizar
            </x-jet-button>

        </x-slot>
    </x-jet-dialog-modal>

</div>
