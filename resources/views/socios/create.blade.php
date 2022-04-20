<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h2 class="text-xl mx-4">Creación de Producoto</h2>

                <div class="flex justify-center">
                    <div class="w-1/2">

                        <form class="flex flex-col my-8"  method="POST" action=" route{{'admin.productos.store'}} ">
                            @csrf

                            <div>
                                <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                            </div>

                            <div>
                                <x-jet-label for="marca" value="{{ __('Marca') }}" />
                                <x-jet-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca')" required autofocus autocomplete="marca" />
                            </div>

                            <div>
                                <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
                                <x-jet-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autofocus autocomplete="codigo" />
                            </div>

                            <div>
                                <x-jet-label for="sku" value="{{ __('SKU') }}" />
                                <x-jet-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku')" required autofocus autocomplete="sku" />
                            </div>

                            <div>
                                <x-jet-label for="description" value="{{ __('Descripción') }}" />
                                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                            </div>

                            <div>
                                <x-jet-label for="costo" value="{{ __('Costo') }}" />
                                <x-jet-input id="costo" class="block mt-1 w-full" type="number" name="costo" :value="old('costo')" required autofocus autocomplete="costo" />
                            </div>

                            {{-- Existencias por default se crean en CERO --}}

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="ml-4">
                                    {{ __('Crear Producto') }}
                                </x-jet-button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
