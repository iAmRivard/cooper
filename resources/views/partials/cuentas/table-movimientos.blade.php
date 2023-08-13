<div class="flex justify-center m-4 rounded-md shadow-lg">
    <div class="w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">id</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Concepto</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Monto</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Saldo a la fecha
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">fecha</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">Tipo</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($movimientos as $movimiento)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $movimiento->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $movimiento->concepto }}</td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <span @if ($movimiento->naturaleza == 1) class="text-green-600" @else class="text-red-600"
                            @endif>
                            ${{ number_format($movimiento->monto,2) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ${{ $movimiento->saldo_fecha }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $movimiento->created_at }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{$movimiento->tipo->nombre}}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        <a href="{{ route('cuenta.abono', $movimiento) }}" class="a-link btn btn-sm">
                            re Imprimir
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="m-4">
    {{$movimientos->links()}}
</div>
