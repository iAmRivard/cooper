<div>
    {{-- Botón para abrir el modal --}}
    <x-jet-nav-link class="cursor-pointer" :active="false" wire:click="$set('open', true)">
        Crear Tipo de cuenta
    </x-jet-nav-link>

    {{-- Modal --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            {{-- <div class="alert alert-error shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Error! Task failed successfully.</span>
                </div>
            </div> --}}
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
                </textarea>
            </div>

            {{-- Porcentaje --}}
            <div class="mb-4 form-control w-full">
                @error('porcentaje')
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
                <select
                    class="select select-bordered w-full"
                    wire:model.defer="plazo"
                >
                    <option>¿Posee plazo?</option>
                    <option value="1">Si</option>
                    <option value="0">NO </option>
                </select>
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="guardar" wire:loading.remove wire:target="guardar">
                Crear Cuenta
            </x-jet-button>

            <span wire:loading wire:target="guardar">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
</div>
