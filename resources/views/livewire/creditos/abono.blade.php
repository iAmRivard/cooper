<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Abonar Credito
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Abono a Credito
        </x-slot>

        <x-slot name="content">
            @error('count')
                <div class="shadow-lg alert alert-error">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $message }}</span>
                    </div>
                </div>
            @enderror

            {{-- Buscar Cuenta --}}
            <div class="mb-4">
                <div x-data="{
                        list: true,
                        account: ''
                    }"
                    x-init="$watch('account', value => $wire.set('cuenta', value))"
                >
                    <div class="w-full form-control">
                        <label class="label">
                            <span class="label-text">Buscar socio</span>
                        </label>
                        <input type="text" placeholder="Código de empleado, DUI, Nombre, Número de cuenta" class="w-full input input-bordered" wire:model="buscar_cuenta" />
                        <div class="p-2 overflow-auto max-h-16" x-show="list" x-transition>
                            @foreach ($cuentas as $cuenta)
                                <button class="w-2/3 px-0 mb-2 cursor-pointer btn btn-secondary" x-on:click="account = {{ $cuenta->id }}">
                                    {{$cuenta->id}} | {{$cuenta->socio->nombres}} {{$cuenta->socio->apellidos}} | {{ $cuenta->tipoCredito->nombre }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex mb-4">

                {{-- Monto de Depostio --}}
                <div class="w-1/2">
                    <x-jet-label>Monto</x-jet-label>
                    <input
                        class="w-full input input-bordered"
                        type="text"
                        type="number"
                        wire:model="monto"
                        required
                        placeholder="$0.00"
                    />
                </div>

                {{-- Tipo de Depostio --}}
                <div class="w-1/2">
                    <x-jet-label>Tipo</x-jet-label>
                    <select class="w-full select select-bordered" required wire:model="tipo">
                        <option>Tipo de abono</option>
                        @foreach($tiposMovimiento as $movimiento)
                            <option value="{{ $movimiento->id }}">
                                {{ $movimiento->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            {{-- Descripción del movimiento --}}
            <div class="mb-4">
                <x-jet-label>
                    Descripción
                </x-jet-label>
                <textarea
                    rows="4"
                    class="w-full textarea textarea-bordered"
                    wire:model="descripcion"
                    placeholder="Descripción del Abono"
                >
                </textarea>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)" >
                cancelar
            </x-jet-secondary-button>
            <x-jet-button  wire:click="abonar">
                abonar
            </x-jet-button>
            <span wire:loading wire:target="abonar">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
</div>
