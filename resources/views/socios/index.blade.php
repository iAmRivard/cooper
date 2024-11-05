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
                                    <div class="font-semibold"> Expiración DUI:</div>
                                    <div class="font-normal">{{ $socio->dui_expiracion ?? 'No asignado' }}</div>
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
                                    <div class="font-normal">{{ $socio->estado == 1 ? 'Activo' : 'Inactivo' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fa-solid fa-hashtag"></i>
                                    <div class="font-semibold"> # de Socio:</div>
                                    <div class="font-normal">{{ $socio->numero_socio ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fa-solid fa-hashtag"></i>
                                    <div class="font-semibold"> Código de empleado:</div>
                                    <div class="font-normal">{{ $socio->codigo_empleado }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-map-marker-alt"></i>
                                    <div class="font-semibold"> Dirección:</div>
                                    <div class="font-normal">{{ $socio->direccion ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-dollar-sign"></i>
                                    <div class="font-semibold"> Salario:</div>
                                    <div class="font-normal">{{ $socio->salario ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-coins"></i>
                                    <div class="font-semibold"> Aportación:</div>
                                    <div class="font-normal">{{ $socio->aportacion ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-building"></i>
                                    <div class="font-semibold"> Empresa:</div>
                                    <div class="font-normal">{{ $socio->empresa->nombre ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-map"></i>
                                    <div class="font-semibold"> Departamento:</div>
                                    <div class="font-normal">{{ $socio->departamento ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-map-pin"></i>
                                    <div class="font-semibold"> Municipio:</div>
                                    <div class="font-normal">{{ $socio->municipio ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-birthday-cake"></i>
                                    <div class="font-semibold"> Fecha de Nacimiento:</div>
                                    <div class="font-normal">{{ $socio->fecha_nacimiento ?? 'No asignado' }}</div>
                                </div>


                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-calendar-plus"></i>
                                    <div class="font-semibold"> Fecha de Inicio (COOPERATVA):</div>
                                    <div class="font-normal">{{ $socio->fecha_inicio ?? 'No asignado' }}</div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-calendar-plus"></i>
                                    <div class="font-semibold"> Fecha de creación:</div>
                                    <div class="font-normal">{{ $socio->created_at ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-briefcase"></i>
                                    <div class="font-semibold"> Cargo:</div>
                                    <div class="font-normal">{{ $socio->cargo ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-user-graduate"></i>
                                    <div class="font-semibold"> Profesión o Oficio:</div>
                                    <div class="font-normal">{{ $socio->profesion_uficio ?? 'No asignado' }}</div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <i class="text-xl fas fa-users"></i>
                                    <div class="font-semibold"> Número de Dependencias:</div>
                                    <div class="font-normal">{{ $socio->numero_dependencia ?? 'No asignado' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="w-1/2 mt-6">
                        <h2 class="mb-4 text-lg font-bold text-center">CUENTAS / CREDITOS ACTIVAS</h2>
                        <div x-data="{ open: true }">
                            <div class="flex justify-center mb-4 space-x-4">
                                <button
                                    type="button"
                                    :class="open == true ? 'btn-active' : 'btn-no-active'" @click="open = true"
                                >
                                    Cuentas
                                </button>
                                <button
                                    type="button"
                                    :class="open == false ? 'btn-active' : 'btn-no-active'" @click="open = false"
                                >
                                    Creditos
                                </button>
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
                    @livewire('beneficiarios.crear', ['socio' => $socio])
                </div>

                <h2 class="flex justify-center text-lg font-bold">Beneficiarios del socio</h2>

                <div class="flex justify-center w-full pb-4 flex-colflex">
                    @livewire('beneficiarios.tabla',['socio' => $socio])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
