<x-jet-dialog-modal wire:model="open_modal">
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
                placeholder="Nombre del tipo de cuenta"
                class="w-full input input-bordered"
                wire:model.defer="nombre"
                value="{{$nombre}}"
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
                <span class="label-text">Porcentaje</span>
            </label>
            <input
                type="number"
                placeholder="0.00%"
                class="w-full input input-bordered"
                wire:model.defer="porcentaje"
                value="{{$porcentaje}}"
            />
        </div>

        {{-- Plazo --}}
        <div class="w-full mb-4 form-control">
            @error('plazo')
            <div class="shadow-lg alert alert-error">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Error! {{ $message }}</span>
                </div>
            </div>
            @enderror
            <label class="label">
                <span class="label-text">Plazo</span>
            </label>
            <select class="w-full select select-bordered">
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
