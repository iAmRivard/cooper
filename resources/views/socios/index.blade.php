<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('user.reset-password',['socio' => $socio])
            @livewire('socios.activar-desactivar',['socio' => $socio])
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex mx-2 mb-8">
                <div class="w-1/2 mx-8 mt-6">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-center text-lg font-bold mb-4">INFORMACIÓN DE SOCIO</h2>

                        <div class="space-y-2 text-lg">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-user text-xl"></i>
                                <div class="font-normal"> {{ $socio->nombres }} {{ $socio->apellidos }}</div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <i class="fas fa-id-card text-xl"></i>
                                <div class="font-semibold"> DUI:</div>
                                <div class="font-normal">{{ $socio->dui }}</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-id-card text-xl"></i>
                                <div class="font-semibold"> NIT:</div>
                                <div class="font-normal">{{ $socio->nit }}</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-envelope text-xl"></i>
                                <div class="font-normal"> {{ $socio->correo }}</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-toggle-on text-xl"></i>
                                <div class="font-semibold"> Estado:</div>
                                <div class="font-normal">{{ $socio->estado = 1 ? 'Activo' : 'Inactivo' }}</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="w-1/2 mt-6">
    <h2 class="text-center text-lg font-bold mb-4">CUENTAS / CREDITOS ACTIVAS</h2>
    <div x-data="{ open: true }">
        <div class="flex justify-center space-x-4 mb-4">
            <button class="bg-gray-200 px-4 py-2 rounded-lg focus:outline-none" :class="{ 'bg-blue-500 text-white': open }" @click="open = true">Cuentas</button>
            <button class="bg-gray-200 px-4 py-2 rounded-lg focus:outline-none" :class="{ 'bg-blue-500 text-white': !open }" @click="open = false">Creditos</button>
        </div>

        <div class="space-y-4">
            <div x-show="open">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($socio_cuentas as $cuenta)
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <h2 class="font-bold">#{{$cuenta->no_cuenta}}</h2>
                            <p>{{$cuenta->tipoCuenta->nombre}}</p>
                            <p><strong>Saldo Actual:</strong> {{ $cuenta->saldo_actual }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div x-show="!open">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($socio_creditos as $credito)
                        <div class="bg-white shadow-lg rounded-lg p-6">
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
                <div class="w-full flex flex-col mt-4 mx-10 space-y-4">

                @livewire('beneficiarios.crear',['socio' => $socio])

                </div>

                <h2 class="flex justify-center text-lg font-bold">Beneficiarios del socio</h2>

                <div class="w-full flex flex-colflex justify-center pb-4">

                    @livewire('beneficiarios.tabla',['socio' => $socio])

                </div>
            </div>

        </div>

    </div>

</x-app-layout>
