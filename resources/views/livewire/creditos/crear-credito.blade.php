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
    <div class="flex items-center">
        <x-jet-label class="mr-2">Buscar Socio:</x-jet-label>
        <x-jet-input
            class="input input-bordered w-full md:w-1/2 max-w-md"
            type="text"
            wire:model="buscar_socio"
            wire:keydown="buscar"
            placeholder="Buscar socio por: Nombre o DUI"
        />
        <button class="ml-2 btn btn-primary" name="buscar" wire:click="buscar">
            <i class="fa-solid fa-magnifying-glass"></i> 
        </button>
    </div>
</div>
<div class="mb-4">
    <x-jet-label>Seleccionar Socio:</x-jet-label>
    <div class="relative">
    <select class="select select-bordered w-full appearance-none  h-26" size="3" style="heigth:50px" required wire:model="selec_socio">
            @foreach ($socios as $socio)
                <option value="{{ $socio->id }}">{{ $socio->nombres }} {{ $socio->apellidos }} | {{$socio->dui}}</option>
            @endforeach
        </select>
    </div>
</div>


            <div class="flex mb-4">
                <div class="w-1/2 pr-4">
                    <x-jet-label>Selección del tipo de Credito</x-jet-label>
                    <select class="select select-bordered w-full" wire:model="tipo_cuenta">
                        <option>Seleccionar tipo de Credito</option>
                        @foreach($tipos_creditos as $tipo_credito)
                            <option value="{{ $tipo_credito->id }}">{{ $tipo_credito->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Número de credito --}}
                <div class="w-1/2 pl-4">
                    <x-jet-label value="Número de credito" />
                    <input
                        type="text"
                        placeholder="Colocar número de credito"
                        wire:model="no_cuenta"
                        class="input input-bordered w-full max-w-xs"
                    />
                </div>
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
                        step="0.01"
                    />
                </div>

            </div>
            <div class="flex mb-4">
                {{-- Porcentaje --}}
                <div class="w-1/2 pr-4">
                    <x-jet-label>Porcentaje Anual de Interes</x-jet-label>
                    <x-jet-input
                        type="number"
                        class="w-full"
                        wire:model="porcentaje"
                        placeholder="36%"
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

            <div class="flex mb-4">
                <div class="w-full">
                    <x-jet-label>Comentario</x-jet-label>
                    <x-jet-input
                        type="text"
                        class="w-full"
                        wire:model="comentarios"
                        placeholder="comentarios"
                    />
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-full">
                    <x-jet-label><strong>NOTA:</strong>Se asignará automaticamente la cuota en base al monto, interes y periodo seleccionado.</x-jet-label>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <label
                for="my-modal-5"
                class="btn"
                wire:click="calcularAmortizacion"
            >
                Crear
            </label>
            <span wire:loading wire:target="crear">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-5" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <div class="mb-4">
                <div class="flex gap-4 mb-4">
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Número de credito</span>
                        </label>
                        <input type="text" placeholder="Número de credito" class="input input-bordered w-full max-w-xs" wire:model="no_cuenta" />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Monto</span>
                        </label>
                        <input type="number" class="input input-bordered w-full max-w-xs" wire:model="monto" />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Cuota Fija</span>
                        </label>
                        <input type="number" disabled="true" class="input input-bordered w-full max-w-xs" wire:model="cuotaFija" />
                    </div>
                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Periodo</span>
                        </label>
                        <input type="number" class="input input-bordered w-full max-w-xs" wire:model="periodo" />
                    </div>
                </div>
                <div class="flex justify-end mb-4">
                    <button
                        class="btn"
                        wire:click="calcularAmortizacion"
                    >
                        recalcular
                    </button>
                </div>
            </div>

            <div class="text-center mb-4">
                <h3 class="text-2xl">Tabla de amortización de credito</h3>
            </div>
            @if ($tabla_amortizacion)
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Semana</th>
                            <th>Cuota Mensual</th>
                            <th>Intereses</th>
                            <th>Cuota Quincenal</th>
                            <th>Saldo</th>
                            <th>Capital Amortizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach($tabla_amortizacion as $tabla => $t)
                        <tr>
                            <th>{{ $t['nro_cuota'] }}</th>
                            <td>{{ $t['cuota'] }}</td>
                            <td>${{ $t['interes'] }}</td>
                            <td>${{ $t['cuota_capital'] }}</td>
                            <td>${{ $t['saldo'] }}</td>
                            <td>${{ $t['capital_amortizado'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="flex justify-center">
                <progress class="progress w-56"></progress>
            </div>
            @endif

            <div class="modal-action">
                <label for="my-modal-5" class="btn btn-success">Cancelar</label>
                <button class="btn" wire:click="crear">Guardar</button>
            </div>
        </div>
    </div>

</div>
