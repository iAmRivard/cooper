<x-app-layout>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="py-8 px-4 grid grid-cols-2 gap-4 grid-flow-row justify-items-center">
                    <div>
                        @livewire('movimientos.abono')
                    </div>
                    <div>
                        @livewire('movimientos.retiros')
                    </div>

                </div>


            </div>

        </div>

    </div>

</x-app-layout>
