<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Reportes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-8 overflow-hidden bg-white shadow-xl sm:rounded-lg">

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

                {{-- <div class="flex justify-between gap-4">
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
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
