<table class="table w-full table-zebra">
    <!-- head -->
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Decripción</th>
            <th>Tasa Anual</th>
            <th>Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuentas as $cuenta)
        <tr>
            <th>{{ $cuenta->nombre }}</th>
            <td>{{ $cuenta->descripcion }}</td>
            <td>{{ $cuenta->porcentaje }}%</td>
            <td>
                <input
                    type="checkbox"
                    class="toggle" @if($cuenta->estado == 1) checked @endif
                    wire:click="actualizarEstado({{$cuenta}})"
                />
            </td>
            <td class="flex justify-center gap-2">
                <button wire:click="openModal({{ $cuenta->id }})" class="btn btn-info btn-sm">
                    Editar
                </button>
                <button wire:click="openModalDelete({{ $cuenta->id }})" class="btn btn-error btn-sm">
                    Eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
