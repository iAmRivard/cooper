<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('creditos.crear-credito')
            @livewire('creditos.abono')
            {{-- @livewire('movimientos.retiros') --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="py-8 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex justify-center mb-8">
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar Crédito') }}" />
                        <x-jet-input
                            class="block w-full mt-1"
                            type="text"
                            wire:model="buscar"
                            placeholder="Buscar socio por Nº de credito"
                        />
                    </div>
                </div>

                <div class="flex justify-center m-4">
                    @include('livewire.creditos.partials.table')
                </div>
                <div class="px-6 py-3">
                    {{$creditos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
