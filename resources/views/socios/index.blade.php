<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('user.reset-password',['socio' => $socio])
            @livewire('socios.activar-desactivar',['socio' => $socio])
        </div>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="flex mx-2 mb-8">
                    <div class="w-1/2 mx-8 mt-6">
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <h2 class="mb-4 text-lg font-bold text-center">INFORMACIÓN DE SOCIO</h2>

                            <div class="space-y-2 text-lg">
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-user"></i>
                                    <div class="font-normal"> {{ $socio->nombres }} {{ $socio->apellidos }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-id-card"></i>
                                    <div class="font-semibold"> DUI:</div>
                                    <div class="font-normal">{{ $socio->dui }}</div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-id-card"></i>
                                    <div class="font-semibold"> NIT:</div>
                                    <div class="font-normal">{{ $socio->nit }}</div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-envelope"></i>
                                    <div class="font-normal"> {{ $socio->correo }}</div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-toggle-on"></i>
                                    <div class="font-semibold"> Estado:</div>
                                    <div class="font-normal">{{ $socio->estado = 1 ? 'Activo' : 'Inactivo' }}</div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fa-solid fa-hashtag"></i>
                                    <div class="font-semibold"> # de Socio:</div>
                                    <div class="font-normal">{{ $socio->numero_socio ?? 'No asignado' }}</div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fa-solid fa-hashtag"></i>
                                    <div class="font-semibold"> Código de empleado:</div>
                                    <div class="font-normal">{{ $socio->codigo_empleado}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-1/2 mt-6">
                        <h2 class="mb-4 text-lg font-bold text-center">CUENTAS / CREDITOS ACTIVAS</h2>
                        <div x-data="{ open: true }">
                            <div class="flex justify-center mb-4 space-x-4">
                                <button class="px-4 py-2 bg-gray-200 rounded-lg focus:outline-none"
                                    :class="{ 'bg-blue-500 text-white': open }" @click="open = true">Cuentas</button>
                                <button class="px-4 py-2 bg-gray-200 rounded-lg focus:outline-none"
                                    :class="{ 'bg-blue-500 text-white': !open }" @click="open = false">Creditos</button>
                            </div>

                            <div class="space-y-4">
                                <div x-show="open">
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        @foreach ($socio_cuentas as $cuenta)
                                        <div class="p-6 bg-white rounded-lg shadow-lg">
                                            <h2 class="font-bold">#{{$cuenta->no_cuenta}}</h2>
                                            <p>{{$cuenta->tipoCuenta->nombre}}</p>
                                            <p><strong>Saldo Actual:</strong> {{ $cuenta->saldo_actual }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div x-show="!open">
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                        @foreach ($socio_creditos as $credito)
                                        <div class="p-6 bg-white rounded-lg shadow-lg">
                                            <h2 class="font-bold">#{{$credito->no_cuenta}}</h2>
                                            <p>{{$credito->tipoCredito->nombre}}</p>
                                            <p><strong>Saldo Actual:</strong> {{ $credito->saldo_actual }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                {{-- Información de las transacciones de los socios --}}
                <div class="flex flex-col w-full mx-10 mt-4 space-y-4">

                    @livewire('beneficiarios.crear',['socio' => $socio])

                </div>

                <h2 class="flex justify-center text-lg font-bold">Beneficiarios del socio</h2>

                <div class="flex justify-center w-full pb-4 flex-colflex">

                    @livewire('beneficiarios.tabla',['socio' => $socio])

                </div>
            </div>

        </div>

    </div>

</x-app-layout>
