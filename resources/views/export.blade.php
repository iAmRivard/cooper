<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Reportes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-8 overflow-hidden bg-white shadow-xl sm:rounded-lg">

                @include('partials.reportes.alerts')

                <div class="flex justify-between gap-4 mb-4">
                    <div class="shadow-xl card w-96 bg-base-100">
                        <div class="card-body">
                            <h2 class="card-title">Cobro cuotas quincenales</h2>
                            <p>Campos:</p>
                            <ul>
                                <li>Tipo de cuenta (Ahorro, Credito)</li>
                                <li>Nombre de socio</li>
                                <li>Código de empleado</li>
                                <li>Número de cuenta</li>
                                <li>Tipo de cuenta (Vista, ahorro, credito)</li>
                                <li>Pago quincenal</li>
                                <li>Cuota</li>
                            </ul>
                            <div class="justify-end card-actions">
                                <a href="{{ route('reporte.cobro-cuotas') }}" class="btn btn-primary">
                                    Decargar
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="shadow-xl card w-96 bg-base-100">
                        <div class="card-body">
                            <h2 class="card-title">Cobro cuotas quincenales Consolidado</h2>
                            <p>Campos:</p>
                            <ul>
                                <li>Código de empleado</li>
                                <li>Nombre de socio</li>
                                <li>Cúota quincenal</li>
                            </ul>
                            <div class="justify-end card-actions">
                                <a href="{{ route('reporte.cobro-cuotas-consolidado') }}" class="btn btn-primary">
                                    Decargar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="flex justify-between gap-4 mb-4">
                    <div class="shadow-xl card w-96 bg-base-100">
                        <div class="card-body">
                            <h2 class="card-title">Cobro Cuotas Quincenales Planilla</h2>
                            <p>Campos:</p>
                            <ul>
                                <li>Código Empleado</li>
                                <li>socio</li>
                                <li>APORTACION</li>
                                <li>AHORRO QUINCENAL VISTA</li>
                                <li>AHORRO QUINCENAL NAVIDENO</li>
                                <li>AHORRO QUINCENAL PROGRAMADO</li>
                                <li>DESCUENTO QUINCENAL</li>
                                <li>CUOTA PRESTAMO</li>
                                <li>INTERES PRESTAMO</li>
                                <li>CAPITAL PRESTAMO</li>
                            </ul>
                            <div class="justify-end card-actions">
                                <a href="{{ route('reporte.cobro-cuotas-quincenales-planilla') }}" class="btn btn-primary">
                                    Decargar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-xl card w-96 bg-base-100">
                        <div class="card-body">
                            <h2 class="card-title">Reporte Cierre de cuentas</h2>
                            <p>Campos:</p>
                            <ul>
                                <li>Código Empleado</li>
                                <li>socio</li>
                                <li>APORTACION</li>
                                <li>AHORRO QUINCENAL VISTA</li>
                                <li>AHORRO QUINCENAL NAVIDENO</li>
                                <li>AHORRO QUINCENAL PROGRAMADO</li>
                                <li>DESCUENTO QUINCENAL</li>
                                <li>CUOTA PRESTAMO</li>
                                <li>INTERES PRESTAMO</li>
                                <li>CAPITAL PRESTAMO</li>
                            </ul>
                            <div class="justify-end card-actions">
                                <form action="{{ route('reporte.cierre-cuentas-excel') }}" method="GET">
                                    <input type="month" class="input input-bordered" name="date" />

                                    <button type="submit" class="btn">Descargar</button>
                                </form>
                                {{-- <a href="{{ route('reporte.cobro-cuotas-quincenales-planilla') }}" class="btn btn-primary">
                                    Decargar
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="flex justify-between gap-4">
                    <div class="shadow-xl card w-96 bg-base-100">
                        <div class="card-body">
                            <h2 class="card-title">Reporte de movimeintos Credito</h2>
                            <div class="justify-end card-actions">
                                <form action="{{ route('reporte.movimientos-creditos-pdf') }}" method="GET">
                                    <input
                                        type="date"
                                        class="w-full mb-2 input input-bordered"
                                        name="start_date"
                                        required
                                    />
                                    <input
                                        type="date"
                                        class="w-full mb-2 input input-bordered"
                                        name="end_date"
                                        required
                                    />

                                    <div class="flex justify-end">
                                        <button type="submit" class="btn">Descargar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
