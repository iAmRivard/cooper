<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Crear Credito
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:ignore.self wire:model="open">
        <x-slot name="title">
            Asignación de credito
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                {{-- Integración --}}
                <x-jet-label>Buscar Socio</x-jet-label>
                <x-jet-input
                    class="w-1/2 input input-bordered max-w-xs"
                    type="text"
                    wire:model="buscar_socio"
                    wire:keydown="buscar"
                    placeholder="Buscar socio por: Nombre o DUI"
                />
                <i class="fa-solid fa-magnifying-glass cursor-pointer"
                    name="buscar"
                    wire:click="buscar"
                >
                </i>
            </div>
            {{-- Selección de socio --}}
            <div class="mb-4">
                <select class="select select-bordered w-full overflow-hidden appearance-none" size="3" required wire:model="selec_socio">
                    @foreach ($socios as $socio)
                        <option value="{{ $socio->id }}">{{ $socio->nombres }} {{ $socio->apellidos }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Selección de tipo de cuenta --}}
            <div class="mb-4">
                <x-jet-label>Selección del tipo de Credito</x-jet-label>
                <select class="select select-bordered w-full" wire:model="tipo_cuenta">
                    <option>Seleccionar tipo de Credito</option>
                    @foreach($tipos_creditos as $tipo_credito)
                        <option value="{{ $tipo_credito->id }}">{{ $tipo_credito->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex mb-4">
                {{-- Nombre del socio --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label>Selección del monto</x-jet-label>
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model="monto"
                        placeholder="$0.00"
                    />
                </div>
                {{-- Apellidos del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Cuota Fija" />
                    <x-jet-input
                        type="number "
                        class="w-full"
                        wire:model="cuotaFija"
                        placeholder="$0.00"
                    />
                </div>
            </div>
            <div class="flex mb-4">
                {{-- Porcentaje --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label>Selección del porcentaje</x-jet-label>
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model="porcentaje"
                        placeholder="%"
                    />
                </div>
                {{-- Apellidos del socio --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Periodo" />
                    <x-jet-input
                        type="number "
                        class="w-full"
                        wire:model="periodo"
                        placeholder="Cantidad de quincenas"
                    />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <label for="my-modal-5" class="btn">Crear</label>
            {{-- <x-jet-button  wire:click="crear">
                crear
            </x-jet-button> --}}
            <span wire:loading wire:target="crear">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-5" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">

            <div>

            </div>

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                  <!-- head -->
                    <thead>
                        <tr>
                            <th>Semana</th>
                            <th>Cuota Mensual</th>
                            <th>Intereses</th>
                            <th>Cuota de Capital</th>
                            <th>Saldo</th>
                            <th>Capital Amortizado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ($tabla_amortizacion)
                        <!-- row 1 -->
                            @foreach($tabla_amortizacion as $tabla => $t)
                            <tr>
                                <th>{{ $t['nro_cuota'] }}</th>
                                <td>{{ $t['cuota'] }}</td>
                                <td>{{ $t['interes'] }}</td>
                                <td>{{ $t['cuota_capital'] }}</td>
                                <td>{{ $t['saldo'] }}</td>
                                <td>{{ $t['capital_amortizado'] }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-action">
{{--                 <label for="my-modal-5" class="btn">Yay!</label>--}}
                <button class="btn" wire:click="crear">Guardar</button>
            </div>
        </div>
    </div>

</div>
