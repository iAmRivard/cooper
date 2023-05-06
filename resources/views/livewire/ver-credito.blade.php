<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('creditos.activar-desactivar', ['credito' => $credito])
            @livewire('creditos.de-baja', ['credito' => $credito])

            @if (count($movimientos) == 1)
            @livewire('creditos.editar', ['credito' => $credito])
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @include('partials.creditos.resume-credito')

                @include('partials.creditos.table-movimientos')

                @include('partials.creditos.table-plan-pagos')
            </div>
        </div>
    </div>
</div>
