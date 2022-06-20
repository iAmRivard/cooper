<div>
    <x-slot name="header">
        @livewire('mantenimientos.create-tipos-cuentas')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="overflow-x-auto">

                    <table class="table table-zebra w-full">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Decripción</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($cuentas as $cuenta)
                        <tr>
                            <th>{{ $cuenta->nombre }}</th>
                            <td>{{ $cuenta->descripcion }}</td>
                            <td>
                                <input
                                    type="checkbox"
                                    class="toggle"
                                    @if($cuenta->estado == 1) checked @endif
                                    wire:click="actualizarEstado({{$cuenta}})"
                                />
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <div>
                        {{ $cuentas->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
