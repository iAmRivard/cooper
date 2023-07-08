<div>
    <x-slot name="header">
        @livewire('mantenimientos.create-tipos-cuentas')
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="p-4 overflow-x-auto">

                    @include('livewire.mantenimientos.partials.tabla-tipo-cuentas')

                    <div>
                        {{ $cuentas->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>

    {{-- Modal edición de tipo de cuenta --}}
    @if ($editTipo)
        @include('livewire.mantenimientos.partials.modal-edit-tipo-cuentas')
    @endif

    {{-- Modal Delete Tipo de cuenta --}}

    @if ($accountDelete)
        @include('livewire.mantenimientos.partials.modal-delete-tipo-cuenta')
    @endif

</div>
