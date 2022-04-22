<div>

    <x-jet-button class="w-80 h-24 font-medium text-center" wire:click="$set('open_abono', true)">
        Abonos
    </x-jet-button>


    <x-jet-dialog-modal wire:model="open_abono">
        <x-slot name="title">
            Abono a cuentas
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>
                    Selección de Socio
                </x-jet-label>

                <datalist id="browsers">
                    <option value="Chrome">
                    <option value="Firefox">
                    <option value="Internet Explorer">
                    <option value="Opera">
                    <option value="Safari">
                    <option value="Microsoft Edge">
                </datalist>

                <select name="" id="">
                    <option value="">hola</option>
                </select>
                <x-jet-input type="text" />
                <span>hola</span>
            </div>

        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>
</div>
