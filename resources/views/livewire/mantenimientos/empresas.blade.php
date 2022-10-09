<div>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex justify-end m-4">
                    <button class="btn" wire:click="$set('open', true)">
                        Crear empresa
                    </button>
                </div>

                <div class="m-4">

                    <table class="table table-zebra w-full">
                        <!-- head -->
                        <thead>
                        <tr>
                            <th>Nombre</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->nombre }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>

    <x-jet-dialog-modal wire:model="open">
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
                    placeholder="Nombre del tipo de credito"
                    class="input input-bordered w-full"
                    wire:model.defer="nombre"
                />
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button class="mx-4" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button wire:click="save" wire:loading.remove wire:target="save">
                Crear
            </x-jet-button>

            <span wire:loading wire:target="save">Procesando ...</span>

        </x-slot>
    </x-jet-dialog-modal>
</div>
