<div>
    <x-slot name="header">
        @livewire('mantenimientos.create-tipos-abono')
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="overflow-x-auto">

                    <table class="table w-full mb-4 table-zebra">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Natulareza</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->nombre }}</td>
                            <td>
                                @if ($tipo->naturaleza == 1)
                                    SALIDA
                                @else
                                    INGRESO
                                @endif
                            </td>
                            <td>
                                <button
                                    wire:click="openModal({{ $tipo->id }})"
                                    class="btn btn-info"
                                >
                                    Editar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                    <div class="mx-4 my-4">
                        {{ $tipos->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>

    @if ($editTipo)
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            {{-- Nombre --}}
            <div class="w-full mb-4 form-control">
                @error('nombre')
                <div class="shadow-lg alert alert-error">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror
                <label class="label">
                    <span class="label-text">Nombre</span>
                </label>
                <input
                    type="text"
                    placeholder="Nombre del tipo de credito"
                    class="w-full input input-bordered"
                    wire:model.defer="nombre"
                />
            </div>
            {{-- Descripción --}}
            <div class="w-full mb-4 form-control">
                @error('descripcion')
                <div class="shadow-lg alert alert-error">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror
                <label class="label">
                    <span class="label-text">Nombre</span>
                </label>
                <input
                    type="text"
                    placeholder="Descripción"
                    class="w-full input input-bordered"
                    wire:model.defer="descripcion"
                />
            </div>
            {{-- Naturaleza --}}
            <div class="w-full mb-4 form-control">
                @error('naturaleza')
                <div class="shadow-lg alert alert-error">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror

                <label class="label">
                    <span class="label-text">Naturaleza</span>
                </label>
                <select
                    class="w-full select select-bordered"
                    wire:model.defer="naturaleza"
                >
                    <option>Selecione un tipo</option>
                    <option value="1">Ingreso</option>
                    <option value="0">Salida</option>
                </select>
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="guardar" wire:loading.remove wire:target="guardar">
                Guardar
            </x-jet-button>

            <span wire:loading wire:target="guardar">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
    @endif
</div>
