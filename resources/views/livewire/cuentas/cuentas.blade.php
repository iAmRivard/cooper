<div>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            @livewire('cuentas.create-cuenta')
            @livewire('movimientos.abono')
            @livewire('movimientos.retiros')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="py-8 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="flex justify-center mb-8">
                    {{-- Input buscar --}}
                    <div class="w-1/2">
                        <x-jet-label value="{{ __('Buscar cuenta') }}" />
                        <x-jet-input
                            class="block w-full mt-1"
                            type="text"
                            wire:model="buscar"
                            placeholder="Buscar por socio, cuenta, cod. empleado, dui"
                        />
                    </div>
                </div>

                <div class="flex justify-center m-4">
                    @include('livewire.cuentas.partials.table')
                </div>

                <div class="m-4">
                    {{ $cuentas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
