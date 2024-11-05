<div class="flex mb-4">
    {{-- Nombre del socio --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Nombre del Socio" />
        <x-jet-input
            type="text"
            class="w-full"
            wire:model.defer="nombres"
            placeholder="Nombres"
            style="text-transform: uppercase;"
        />
        <x-jet-input-error for="nombres" />
    </div>

    {{-- Apellidos del socio --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Apellidos del Socio" />
        <x-jet-input
            type="text"
            class="w-full"
            wire:model.defer="apellidos"
            placeholder="Apellidos"
            style="text-transform: uppercase;"
        />
        <x-jet-input-error for="apellidos" />
    </div>
</div>

<div class="flex mb-4">
    {{-- Numero de socio --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Número de socio" />
        <x-jet-input
            type="text"
            class="w-full"
            wire:model.defer="numero_socio"
            placeholdeR="Número de socio"
        />
        <x-jet-input-error for="numero_socio" />
    </div>

    {{-- Codigo del empleado --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Código de empleado" />
        <x-jet-input
            placeholder="Código de empleado"
            type="text"
            class="w-full"
            wire:model.defer="codigoEmpleado"
        />
        <x-jet-input-error for="codigoEmpleado" />
    </div>
</div>

<div class="flex mb-4">
    {{-- DUI del socio --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="DUI del Socio" />
        <x-jet-input
            x-mask="99999999-9"
            placeholder="99999999-9"
            type="text"
            class="w-full"
            wire:model="dui"
        />
        <x-jet-input-error for="dui" />
    </div>

    {{-- NIT del socio --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="NIT del Socio" />
        <x-jet-input
            x-mask="9999-999999-999-9"
            placeholder="9999-999999-999-9"
            type="text"
            class="w-full"
            wire:model.defer="nit"
        />
        <x-jet-input-error for="nit" />
    </div>
</div>

<div class="flex mb-4">
    {{-- Expiración DUI --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Fecha expiración DUI" />
        <x-jet-input
            type="date"
            class="w-full"
            wire:model.defer="dui_epiracion"
        />
        <x-jet-input-error for="dui_epiracion" />
    </div>
    {{-- Fecha de nacimiento --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Fecha de nacimiento" />
        <x-jet-input
            type="date"
            class="w-full"
            wire:model.defer="fecha_nacimiento"
        />
        <x-jet-input-error for="fecha_nacimiento" />
    </div>
</div>

{{-- Dirección del soción del socio--}}
<div class="mb-4">
    <x-jet-label value="Dirección del Socio" />
    <x-jet-input
        type="text"
        class="w-full"
        wire:model.defer="direccion"
        placeholder="Dirección de residencia del socio"
        style="text-transform: uppercase;"
    />
    <x-jet-input-error for="direccion" />
</div>

<div class="flex mb-4">
    {{-- DUI del socio --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Departamento" />
        <x-jet-input
            type="text"
            class="w-full"
            wire:model="departamento"
            placeholder="Departamento"
            style="text-transform: uppercase;"
        />
        <x-jet-input-error for="departamento" />
    </div>

    {{-- NIT del socio --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Municipio" />
        <x-jet-input
            type="text"
            class="w-full"
            wire:model.defer="municipio"
            placeholder="Municipio"
            style="text-transform: uppercase;"
        />
        <x-jet-input-error for="nit" />
    </div>
</div>

<div class="flex mb-4">
    {{-- Salario del socio --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Cargo" />
        <x-jet-input
            type="text"
            class="w-full"
            wire:model.defer="cargo"
            placeholder="Cargo"
            style="text-transform: uppercase;"
        />
        <x-jet-input-error for="cargo" />
    </div>

    {{-- Aportación del socio --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Profesión u oficio" />
        <x-jet-input
            placeholder="Estudiante"
            type="text"
            class="w-full"
            wire:model="profesion_uficio"
            style="text-transform: uppercase;"
        />
        <x-jet-input-error for="profesion_uficio" />
    </div>
</div>

<div class="flex mb-4">
    {{-- Salario del socio --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Salario del Socio" />
        <x-jet-input
            type="number"
            class="w-full"
            wire:model.defer="salario"
            placeholder="$400.00"
        />
        <x-jet-input-error for="salario" />
    </div>

    {{-- Aportación del socio --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Aportacion" />
        <x-jet-input
            placeholder="$10.00"
            type="number"
            class="w-full"
            wire:model="aportacion"
        />
        <x-jet-input-error for="aportacion" />
    </div>
</div>

<div class="flex mb-4">
    {{-- Correo electronico --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Correo del Socio" />
        <x-jet-input
            type="email"
            class="w-full"
            wire:model.defer="correo"
            placeholdeR="ejemplo@ejemplo.com"
        />
        <x-jet-input-error for="correo" />
    </div>

    {{-- Empresa --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Nombre de empresa" />
        <select class="w-full select select-bordered" wire:model="empresa">
            <option >Seleccionar una empresa</option>
            @foreach ($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
            @endforeach
        </select>
        <x-jet-input-error for="empresa" />
    </div>
</div>

<div class="flex mb-4">
    {{-- Expiración DUI --}}
    <div class="w-1/2 pr-4">
        <x-jet-label value="Fecha de ingreso a la COOPERATIVA" />
        <x-jet-input
            type="date"
            class="w-full"
            wire:model.defer="fecha_inicio"
        />
        <x-jet-input-error for="fecha_inicio" />
    </div>
    {{-- Fecha de nacimiento --}}
    <div class="w-1/2 pl-4">
        <x-jet-label value="Número de personas que dependen económicamente" />
        <x-jet-input
            type="number"
            class="w-full"
            wire:model.defer="numero_dependencia"
        />
        <x-jet-input-error for="numero_dependencia" />
    </div>
</div>
