<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    @if ($errors->any())
                    <div class="m-4">
                        <div class="alert alert-warning shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="py-4 flex justify-center items-center gap-4 p-2">
                    {{-- Quincena --}}
                    <label><b>Quincena:</b> </label>
                    <select class="select select-bordered w-full max-w-xs" wire:model.defer="quincena" required>
                        <option>Seleccionar</option>
                        <option value="1">1ra Quincena</option>
                        <option value="2">2da Quincena</option>
                    </select>
                    {{-- Año --}}
                    <label><b>Año:</b> </label>
                    <input type="number" placeholder="202X" min="1950" max="3000" class="input input-bordered w-full max-w-xs" wire:model.defer="year" required />
                    {{-- Mes --}}
                    <label><b>Mes:</b> </label>
                    <input type="number" min="1" max="12" placeholder="1" class="input input-bordered w-full max-w-xs" wire:model.defer="month" required />
                    <button class="btn" wire:click="search">Buscar</button>
                </div>

                @if (session()->has('message'))
                <div class="m-4">
                    <div class="alert alert-error shadow-lg">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>{{ session('message') }}</span>
                        </div>
                    </div>
                </div>
                @endif

                @if ($data)
                <div class="overflow-x-auto m-4">
                    <table class="table table-zebra w-full">
                      <!-- head -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DUI</th>
                                <th>Empresa</th>
                                <th>ID Tipo de cuenta</th>
                                <th>Tipo de cuenta</th>
                                <th>Año</th>
                                <th>Mes</th>
                                <th>Quincena</th>
                                <th>Días quincena</th>
                                <th>Porcentaje Actual</th>
                                <th>Porcentaje Diario</th>
                                <th>Saldo Cierre</th>
                                <th>Interes generado</th>
                                <th>Saldo Final</th>
                                <th>Saldo Final</th>
                                <th>Aportación</th>
                                <th>Saldo final cierre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            @foreach ($data as $da)
                            <tr>
                                <th>{{$da->id_cuenta}}</th>
                                <th>{{$da->nombres}}</th>
                                <th>{{$da->apellidos}}</th>
                                <th>{{$da->dui}}</th>
                                <th>{{$da->empresa}}</th>
                                <th>{{$da->id_tipo_cuenta}}</th>
                                <th>{{$da->mombre_tipo_cuenta}}</th>
                                <th>{{$da->anio}}</th>
                                <th>{{$da->mes}}</th>
                                <th>{{$da->quincena}}</th>
                                <th>{{$da->dias_anio}}</th>
                                <th>{{$da->dias_quincena}}</th>
                                <th>{{$da->porcentaje_anual}}</th>
                                <th>{{$da->porcentaje_diario}}</th>
                                <th>{{$da->saldo_cierre}}</th>
                                <th>{{$da->intereses_generados}}</th>
                                <th>{{$da->saldo_final}}</th>
                                <th>{{$da->aportacion}}</th>
                                <th>{{$da->saldo_final_cierre}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
