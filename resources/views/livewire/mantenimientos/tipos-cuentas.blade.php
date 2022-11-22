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
                          <th>Tasa Anual</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($cuentas as $cuenta)
                        <tr>
                            <th>{{ $cuenta->nombre }}</th>
                            <td>{{ $cuenta->descripcion }}</td>
                            <td>{{ $cuenta->porcentaje }}%</td>
                            <td>
                                <input
                                    type="checkbox"
                                    class="toggle"
                                    @if($cuenta->estado == 1) checked @endif
                                    wire:click="actualizarEstado({{$cuenta}})"
                                />
                            </td>
                            <td>
                                <button
                                    wire:click="openModal({{ $cuenta->id }})"
                                    class="btn btn-info"
                                >
                                    Editar
                                </button>
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

    @if ($editTipo)
    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">

        </x-slot>
        <x-slot name="content">
            {{-- Nombre --}}
            <div class="mb-4 form-control w-full">
                @error('nombre')
                <div class="alert alert-error shadow-lg">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror
                <label class="label">
                    <span class="label-text">Nombre</span>
                </label>
                <input
                    type="text"
                    placeholder="Nombre del tipo de cuenta"
                    class="input input-bordered w-full"
                    wire:model.defer="nombre"
                    value="{{$nombre}}"
                />
            </div>
            {{-- Descripción --}}
            <div class="mb-4 form-control w-full">
                @error('descripcion')
                <div class="alert alert-error shadow-lg">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror
                <label class="label">
                    <span class="label-text">Descripción</span>
                </label>
                <textarea
                    class="textarea textarea-bordered"
                    placeholder="Brebe descripción de que tipo de cuenta"
                    wire:model.defer="descripcion"
                >
                    {{$descripcion}}
                </textarea>
            </div>

            {{-- Porcentaje --}}
            <div class="mb-4 form-control w-full">
                @error('descripcion')
                <div class="alert alert-error shadow-lg">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror
                <label class="label">
                    <span class="label-text">Porcentaje</span>
                </label>
                <input
                    type="number"
                    placeholder="0.00%"
                    class="input input-bordered w-full"
                    wire:model.defer="porcentaje"
                    value="{{$porcentaje}}"
                />
            </div>

            {{-- Plazo --}}
            <div class="mb-4 form-control w-full">
                @error('plazo')
                <div class="alert alert-error shadow-lg">
                    <div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                      <span>Error! {{ $message }}</span>
                    </div>
                </div>
                @enderror
                <label class="label">
                    <span class="label-text">Plazo</span>
                </label>
                <select class="select select-bordered w-full">
                    <option>¿Posee plazo?</option>
                    <option @if ($plazo == 1) selected @endif>Si</option>
                    <option @if ($plazo == 0) selected @endif>NO </option>
                  </select>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mx-4" wire:click="$set('open_modal', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="updateTipo" wire:loading.remove wire:target="updateTipo">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    @endif

</div>
