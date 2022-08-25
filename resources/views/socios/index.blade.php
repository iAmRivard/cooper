<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex mx-2 mb-8">

                    <div class="w-1/2 mx-8 mt-6">
                        <h2 class="flex justify-center text-lg font-bold">INFORMACIÓN DE SOCIO</h2>

                        <div class="flex flex-col mt-4 space-y-4">
                            <p> <strong>Nombres:</strong> <span>{{ $socio->nombres }}</span> </p>
                            <p> <strong>Apellidos:</strong> <span>{{ $socio->apellidos }}</span> </p>
                            <p> <strong>DUI:</strong> <span>{{ $socio->dui }}</span> </p>
                            <p> <strong>NIT:</strong> <span>{{ $socio->nit }}</span> </p>
                            <p> <strong>Correo:</strong> <span>{{ $socio->correo }}</span> </p>
                           <p>  <strong>Estado:</strong> {{ $socio->estado = 1 ? 'Activo' : 'Inactivo' }} </p>
                        </div>

                    </div>

                    <div class="w-1/2 mt-6">

                        <h2 class="flex justify-center text-lg font-bold">CUENTAS / CREDITOS ACTIVAS </h2>
                        <div x-data="{open: true}">

                            <div class="tabs w-full">
                                <a
                                    class="tab tab-lifted"
                                    :class="open ? 'tab-active' : ''"
                                    @click="open = ! open"
                                >
                                    Cuentas
                                </a>
                                <a
                                    class="tab tab-lifted"
                                    :class="!open ? 'tab-active' : ''"
                                    @click="open = ! open"
                                >
                                    Creditos
                                </a>
                            </div>

                            <div class="block" :class="open ? '' : 'hidden' ">

                                <div class="carousel">
                                    @foreach ($socio_cuentas as $cuenta)
                                    <div id="{{ $cuenta->id }}" class="carousel-item w-full">

                                        <div class="card w-full bg-base-100">
                                            <div class="card-body shadow-xl">
                                                <h2 class="card-title">#{{$cuenta->id}}</h2>
                                                <p>{{$cuenta->tipoCuenta->nombre}}</p>
                                                <p><strong>Saldo Actual:</strong> {{ $cuenta->saldo_actual }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-center w-full py-2 gap-2">
                                    @foreach ($socio_cuentas as $cuenta)
                                    <a href="#{{ $cuenta->id }}" class="btn btn-xs">o</a>
                                    @endforeach
                                </div>

                            </div>

                            {{-- Creditos --}}
                            <div
                                class="card w-96 bg-base-100 "
                                :class="open ? 'hidden' : '' "
                            >
                                <div class="carousel">
                                    @foreach ($socio_creditos as $credito)
                                    <div id="credito-{{ $credito->id }}" class="carousel-item w-full">

                                        <div class="card w-full bg-base-100">
                                            <div class="card-body shadow-xl">
                                                <h2 class="card-title">#{{$credito->id}}</h2>
                                                <p>{{$credito->tipoCredito->nombre}}</p>
                                                <p><strong>Saldo Actual:</strong> {{ $credito->saldo_actual }}</p>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-center w-full py-2 gap-2">
                                    @foreach ($socio_creditos as $credito)
                                    <a href="#credito-{{ $credito->id }}" class="btn btn-xs">o</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Información de las transacciones de los socios --}}
                <div class="w-full flex flex-col mt-4 mx-10 space-y-4">

                    @livewire('socios.table', ['socio' => $socio])

                </div>

                <h2 class="flex justify-center text-lg font-bold">Beneficiarios del socio</h2>

                <div class="w-full flex flex-colflex justify-center ">

                    @livewire('beneficiarios.tabla',['socio' => $socio])

                </div>
            </div>

        </div>

    </div>

</x-app-layout>
