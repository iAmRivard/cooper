<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('cuenta.cuenta', $cuenta)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                Imprimir
            </a>

            <h2>{{$cuenta->no_cuenta}}</h2>
            <div class="flex justify-center">


                <table class="border-collapse border border-slate-500  shadow-md">
                    <thead>
                        <tr>
                            <th class="bg-zinc-50 border boder-gray-400 px-4 py-2 text-gray-800">Concepto</th>
                            <th class="bg-zinc-50 border boder-gray-400 px-4 py-2 text-gray-800">Monto</th>
                            <th class="bg-zinc-50 border boder-gray-400 px-4 py-2 text-gray-800">fecha</th>
                            <th class="bg-zinc-50 border boder-gray-400 px-4 py-2 text-gray-800">Tipo</th>
                            <th class="bg-zinc-50 border boder-gray-400 px-4 py-2 text-gray-800"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuenta->movimientos as $movimiento)

                        <tr>
                            <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $movimiento->concepto }}</td>
                            <td class="border boder-gray-400 px-4 py-2 text-gray-800">${{ number_format($movimiento->monto,2) }}</td>
                            <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{ $movimiento->created_at }}</td>
                            <td class="border boder-gray-400 px-4 py-2 text-gray-800">{{$movimiento->tipo->nombre}}</td>
                            <td class="border boder-gray-400 px-4 py-2 text-gray-800">
                                <a href="{{ route('cuenta.re.impresion', $movimiento->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                    re Imprimir
                                </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>



        </div>
    </div>
</div>
