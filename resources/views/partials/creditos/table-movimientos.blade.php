<div class="flex justify-center m-4 rounded-md shadow-lg">
    <div class="w-full overflow-x-auto ">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">ID
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Tipo</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Concepto</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Monto</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Fecha</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($movimientos as $movimiento)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $movimiento->id }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        {{$movimiento->tipoMovimiento->nombre}}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap"
                        title="{{ $movimiento->descripcion }}">
                        {{ Str::limit($movimiento->descripcion, 20) }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <span
                            class="@if ($movimiento->tipoMovimiento->naturaleza == 0) text-green-600 @else text-red-600 @endif">
                            ${{ number_format($movimiento->monto,2) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        {{ $movimiento->created_at }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        <a href="{{ route('credito.abono', $movimiento) }}" class="a-link btn btn-sm">
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
    {{ $movimientos->appends(['plan_pago_page' => $plan_pago->currentPage()])->links() }}
</div>
