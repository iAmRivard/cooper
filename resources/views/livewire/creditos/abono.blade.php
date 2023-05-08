<div>
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Abonar Credito
    </x-jet-nav-link>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Abono a Credito
        </x-slot>

        <x-slot name="content">


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @error('count')
            <div class="shadow-lg alert alert-error">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            </div>
            @enderror

            {{-- Buscar Cuenta --}}
            <div class="mb-4">
                <div x-data="{
                    list: true,
                    account: '',
                    search: '',
                    filteredCuentas: [],
                    selectedAccount: null,
                    detCuota: null,
                }" x-init="
                    $watch('search', async (value) => {
                        filteredCuentas = value.length >= 3
                            ? await $wire.searchAccounts(value)
                            : [];
                    });
                    $watch('account', value => {
                        selectedAccount = value
                            ? filteredCuentas.find(cuenta => cuenta.id === value)
                            : null;
                    });

                    $watch('account', async (value) => {
                        detCuota = await $wire.searCuota(value) ?? null;
                    });
                ">
                    <div x-show="!account" class="w-full form-control">
                        <label class="label">
                            <span class="label-text">Buscar socio</span>
                        </label>
                        <input
                            x-model="search"
                            type="text"
                            placeholder="Código de empleado, DUI, Nombre, Número de cuenta"
                            class="w-full input input-bordered"
                        />
                        <div
                            class="p-2 overflow-auto bg-white border border-gray-200 rounded shadow-lg max-h-48"
                            x-show="list && search.length > 0"
                            x-transition
                        >
                            <template x-for="(cuenta, index) in filteredCuentas" :key="index">
                                <button
                                    class="w-full px-2 py-1 mb-1 text-left cursor-pointer hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                                    x-on:click="
                                        account = cuenta.id;
                                        list = false;
                                        $wire.set('cuenta', cuenta.id);
                                    "
                                >
                                    <div class="flex items-center">
                                        <div class="flex-1">
                                            <span class="font-bold text-gray-800" x-text="cuenta.no_cuenta"></span> |
                                            <span x-text="cuenta.socio.nombres"></span>
                                            <span x-text="cuenta.socio.apellidos"></span> |
                                            <span x-text="cuenta.tipo_credito.nombre"></span>
                                        </div>
                                    </div>
                                </button>
                            </template>
                            <template x-if="filteredCuentas.length === 0">
                                <p class="text-sm text-gray-400">No se encontraron resultados.</p>
                            </template>
                        </div>
                    </div>
                    {{-- Presentar información al usuario --}}
                    <div x-show="account" class="p-4 bg-white border border-gray-200 rounded shadow-md">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-lg font-semibold">Información del crédito</h2>
                            <button
                                class="text-sm text-blue-500 focus:outline-none"
                                x-on:click="
                                    account = '';
                                    selectedAccount = null;
                                    list = true;
                                    $wire.resetProperties();
                                "
                            >
                                Cambiar selección
                            </button>
                        </div>
                        <table class="w-full text-left">
                            <tr>
                                <td class="py-2 font-semibold">Crédito:</td>
                                <td class="py-2">#<span x-text="selectedAccount && selectedAccount.no_cuenta"></span></td>
                            </tr>
                            <tr>
                                <td class="py-2 font-semibold">Nombre:</td>
                                <td class="py-2">
                                    <span x-text="selectedAccount && selectedAccount.socio.nombres"></span>
                                    <span x-text="selectedAccount && selectedAccount.socio.apellidos"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 font-semibold">Monto:</td>
                                <td class="py-2">$<span x-text="selectedAccount && selectedAccount.monto"></span></td>
                            </tr>
                            <tr>
                                <td class="py-2 font-semibold">Saldo Actual:</td>
                                <td class="py-2">$<span x-text="selectedAccount && selectedAccount.saldo_actual"></span></td>
                            </tr>
                        </table>

                        <div x-show="detCuota !== null && detCuota !== undefined" class="mt-4">
                            <h3 class="mb-2 text-lg font-semibold">Detalle de cuota</h3>
                            <table class="w-full text-left">
                                <tr>
                                    <td class="py-2 font-semibold">Cuota #</td>
                                    <td class="py-2"><span x-text="detCuota && detCuota.nro_cuota"></span></td>
                                </tr>
                                <tr>
                                    <td class="py-2 font-semibold">Monto</td>
                                    <td class="py-2"><span x-text="detCuota && detCuota.cuota"></span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button x-on:click="$wire.selectCuenta(selectedAccount.id)" class="btn btn-sm">
                                Seleccionar Cuota
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mb-4">
                {{-- Monto de Depostio --}}
                <div class="w-1/2">
                    <x-jet-label>Monto</x-jet-label>
                    <input class="w-full input input-bordered" type="text" type="number" wire:model="monto" required
                        placeholder="$0.00" />
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
            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)">
                cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="abonar">
                abonar
            </x-jet-button>
            <span wire:loading wire:target="abonar">Procesando ...</span>
        </x-slot>
    </x-jet-dialog-modal>
</div>
