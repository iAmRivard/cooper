<div class="text-center">
    <h4>
        <b>PLAN DE PAGO</b>
    </h4>
</div>
<div class="flex justify-center m-4 rounded-md shadow-lg">
    <div class="w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">#
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Cuota</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Intereses</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Interes Acumulado</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Cuota Capital</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Saldo</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Capital Amortizado</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-gray-500 uppercase">
                        Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($plan_pago as $pago)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        #{{ $pago->nro_cuota }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${{ $pago->cuota }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${{ $pago->interes }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ${{ $pago->interes_acumulado }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ${{ $pago->cuota_capital }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${{ $pago->saldo }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                        ${{ $pago->capital_amortizado }}</td>
                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                        <span class="@if ($pago->estado == 1) text-red-600 @else text-green-600 @endif">
                            {{ $pago->estado == 1 ? 'Pendiente' : 'Pagada' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="m-4">
    {{ $plan_pago->appends(['movimientos_page' => $movimientos->currentPage()])->links() }}
</div>
