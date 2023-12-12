<x-jet-dialog-modal wire:ignore.self wire:model="openTable">
    <x-slot name="title">
        Tabla de Cuenta {{ $tipo_cuenta_selected->nombre ?? '' }}
    </x-slot>

    <x-slot name="content">
        <strong>Porcentaje Anual: </strong>%{{ ($tipo_cuenta_selected->porcentaje ?? 0 )}}<br/>
        <strong>Porcentaje Mensual: </strong>%{{ (($tipo_cuenta_selected->porcentaje ?? 0) / 100)/12}}<br/>
        <strong>Porcentaje Quincenal: </strong>%{{ (($tipo_cuenta_selected->porcentaje ?? 0) / 100)/24}}<br/>
        <strong>¿Es plazo?:</strong>{{ $tipo_cuenta_selected->plazo ?? 0 == 1 ? 'Si' : 'No' }} <br/>
        <strong>¿Aportación Quincenal o Monto Fijo?:</strong>{{ $tipo_cuenta_selected->aplica_monto ?? 0 == 1 ? 'Plazo Fijo' : ' Con Aportación Quincenal'}} <br/>
        <small>Intereses serán calculados mensualmente antes del cobro de la cuota, independientemente la fecha en que se aperture. Se recomienda aperturar antes de la primera quincena de cada mes.</small>
        <hr/>
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>{{ $tipo_cuenta_selected->aplica_monto ?? 0 == 1 ? 'Mes' : ' Quincena'}} </th>
                        <th>Monto</th>
                        @if(($tipo_cuenta_selected->aplica_monto ?? 0) == 0 )
                        <th>Base Calculo</th>
                        @endif
                        <th>Interés</th>
                        <th>Interés</th>
                        <th>Capital</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($tabla as $t)
                    <tr>
                        <th>{{ $t['quincena'] }}</th>
                        <th>${{ $t['monto'] }}</th>
                        @if(($tipo_cuenta_selected->aplica_monto ?? 0) == 0 )
                        <th>${{ $t['capital'] - $t['interes'] - $t['monto']}}</th>
                        @endif
                        <th>%{{ $t['tasaInteres']}}</th>
                        <td>${{ $t['interes'] }}</td>
                        <td>${{ $t['capital'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button class="mx-4" wire:click="cerarTabla">
            cancelar
        </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
