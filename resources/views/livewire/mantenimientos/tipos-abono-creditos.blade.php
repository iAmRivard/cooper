<div>
    <x-slot name="header">
        @livewire('mantenimientos.create-tipos-abono-creditos')
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
                          <th>natulareza</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->nombre }}</td>
                            <td>
                                @if ($tipo->naturaleza == 1)
                                    EGRESO
                                @else
                                    INGRESO
                                @endif
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <div>
                        {{-- {{ $tipos->links() }} --}}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
