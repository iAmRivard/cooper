<div class="overflow-x-auto">
    <table class="table table-xs table-zebra">
    <thead>
        <tr>
            <th>Cod. Empleado</th>
            <th># de Socio</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Empresa</th>
            <th>DUI</th>
            <th>Ap. Quincenal</th>
            <th>Estado</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($socios as $item)
            <tr>
                <td class="font-bold">{{ $item->codigo_empleado }}</td>
                <td>{{ $item->numero_socio ?? 'No definido' }}</td>
                <td>{{ $item->nombres}} </td>
                <td>{{ $item->apellidos}}</td>
                <td class="font-bold" >{{ $item->empresa->nombre }}</td>
                <td>{{ $item->dui }}</td>
                <td class="font-bold" >${{ $item->aportacion }}</td>
                <td class="font-bold" >{{ $item->estado == 0 ? 'Inactivo' : 'Activo' }}</td>

                <td>
                    <a class="cursor-pointer" wire:click="editar( {{$item}} )">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{route('ver.socio', $item)}}" class="font-semibold">
                        Ver socio
                    </a>
                </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Cod. Empleado</th>
                <th># de Socio</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Empresa</th>
                <th>DUI</th>
                <th>Ap. Quincenal</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>
