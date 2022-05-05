<div>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-8">
                <div class="flex justify-end mx-24">
                    @livewire('cuentas.create-cuenta')
                </div>

                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar cuenta') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" wire:model="buscar" />
                    </div>
                </div>

                <div class="container py-8 flex justify-center">
                    <div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th># Cuenta</th>
                                    <th>Socio</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <td>{{ $cuenta->no_cuenta}}</td>
                                        <td>
                                            {{ $cuenta->socio->nombres . " " . $cuenta->socio->apellidos }}
                                        </td>
                                        <td>{{ $cuenta->tipoCuenta->nombre }}</td>

                                        <td>
                                            <a href="{{ route('ver.cuenta', $cuenta) }}" class="a-link">
                                                ver cuenta
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="px-6 py-3 flex justify-items-center justify-around">
                    {{$cuentas->links()}}
                </div>

            </div>

        </div>

    </div>

</div>
