<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <h2 class="text-xl mx-4">Socios / Creación de Socios</h2>

                <div class="flex justify-end">
                    <a class="px-8" href="{{ route('socios.create') }}">
                        <button type="button" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">
                            Crear Socio
                        </button>
                    </a>
                </div>

                {{-- Probablemente la busqueda y ver productos sea
                    un componente de Livewire --}}
                <div class="flex justify-center">
                    <div class="w-1/2">
                        <x-jet-label for="name" value="{{ __('Buscar socio') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                </div>

                <div class="container py-8 flex justify-center">
                    <table class="border-collapse border border-slate-500 ">
                        <thead>
                            <tr>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Nombre</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Apellido</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">DUI</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">NIT</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Direción</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800">Estado</th>
                                <th class="border boder-gray-400 px-4 py-2 text-gray-800"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border boder-gray-400 px-4 py-2 text-gray-800">adsad </td>
                                <td  class="border boder-gray-400 px-4 py-2 text-gray-800"> adsad</td>
                                <td  class="border boder-gray-400 px-4 py-2 text-gray-800"> adsad</td>
                                <td  class="border boder-gray-400 px-4 py-2 text-gray-800">adsad </td>
                                <td  class="border boder-gray-400 px-4 py-2 text-gray-800"> adsad</td>
                                <td  class="border boder-gray-400 px-4 py-2 text-gray-800"> adsad</td>
                                <td  class="border boder-gray-400 px-4 py-2 text-gray-800">
                                    {{-- {{route('admin.productos.edit')}} --}}
                                    <a href="#" class="">
                                        <button type="button" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">Editart</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
