<x-jet-dialog-modal wire:ignore.self wire:model="openTable">
    <x-slot name="title">
        Tabla de Cuenta
    </x-slot>

    <x-slot name="content">
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>Quincena</th>
                        <th>interes</th>
                        <th>capital</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    @foreach ($tabla as $t)
                    <tr>
                        <th>{{ $t['quincena'] }}</th>
                        <td>{{ $t['interes'] }}</td>
                        <td>{{ $t['capital'] }}</td>
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
