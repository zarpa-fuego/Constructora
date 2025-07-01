<div>
    <div class="flex gap-4 mb-6">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded w-1/3">
            <div class="font-bold text-lg">Disponibles</div>
            <div class="text-3xl font-extrabold">
                {{ $todosTerrenos->where('Estado_Terreno', 'Disponible')->count() }}
            </div>
        </div>
        <div class="bg-yellow-100 border-l-4 border-yellow-200  text-yellow-800 p-4 rounded w-1/3">
            <div class="font-bold text-lg">Reservados</div>
            <div class="text-3xl font-extrabold">
                {{ $todosTerrenos->where('Estado_Terreno', 'Reservado')->count() }}
            </div>
        </div>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded w-1/3">
            <div class="font-bold text-lg">Vendidos</div>
            <div class="text-3xl font-extrabold">
                {{ $todosTerrenos->where('Estado_Terreno', 'Vendido')->count() }}
            </div>
        </div>
    </div>

    <div class="text-2xl mb-6 border-blue-200 border-b-2 w-60">Terrenos</div>
    <div class="flex gap-3">
    <div class="flex items-center p-2 rounded-md flex-1">
                <label class="w-full relative text-gray-400 focus-within:text-gray-600 block">
                    <svg class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 25 25"  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <x-input type="text" wire:model="search" class="w-full block pl-14" placeholder="Buscar elemento..."/>
                </label>
     </div>
    </div>
    <div class="flex items-center justify-center">
        <table class="border-separate w-full border-spacing-y-2 text-sm">
            <thead class="bg-gray-500 text-gray-100">
                <tr>
                    <th class="th-class">ID</th>
                    <th class="th-class">Nombre Terreno</th>
                    <th class="th-class">Área (m2)</th>
                    <th class="th-class">Estado</th>
                    <th class="th-class">Dirección</th>
                    <th class="th-class">Precio</th>
                    <th class="th-class">Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($terrenos as $item)
            <tr>
                <td class="td-class">{{$item->ID_Terrreno}}</td>
                <td class="td-class">{{$item->Nombre_Terreno}}</td>
                <td class="td-class">{{$item->Area_m2}}</td>
                <td class="td-class">
                    @if($item->Estado_Terreno === 'Disponible')
                        <span class="px-2 py-1 rounded bg-green-200 text-green-800 font-semibold">Disponible</span>
                    @elseif($item->Estado_Terreno === 'Reservado')
                        <span class="px-2 py-1 rounded bg-yellow-200 text-yellow-800 font-semibold">Reservado</span>
                    @elseif($item->Estado_Terreno === 'Vendido')
                        <span class="px-2 py-1 rounded bg-red-200 text-red-800 font-semibold">Vendido</span>
                    @else
                        <span class="px-2 py-1 rounded bg-gray-200 text-gray-800 font-semibold">{{ $item->Estado_Terreno }}</span>
                    @endif
                </td>
                <td class="td-class">{{$item->Dirrecion}}</td>
                <td class="td-class">{{$item->Precio}}</td>
                <td class="td-class">
                    <div class="flex gap-1">
                        <button wire:click="registrarVenta({{$item->ID_Terrreno}})" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-800 transition">
                            Registrar venta
                        </button>
                        <button wire:click="reservarTerreno({{$item->ID_Terrreno}})" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-700 transition">
                            Reservar
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
    </div>

    @if($showSupplierForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-lg w-full max-w-md text-black">
                <h2 class="text-xl font-bold mb-4">{{ $modalTitle }}</h2>
                <form wire:submit.prevent="{{ $modalAction }}">
                    <div class="mb-2 flex gap-2 items-end">
                        <div class="flex-1">
                            <label>DNI</label>
                            <input type="text" wire:model.defer="dni" class="w-full border rounded px-2 py-1 text-black">
                        </div>
                        <button type="button" wire:click="buscarClientePorDNI" class="px-2 py-1 bg-blue-500 text-white rounded">Buscar</button>
                    </div>
                    <div class="mb-2">
                        <label>Nombre</label>
                        <input type="text" wire:model.defer="nombre" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="mb-2">
                        <label>Apellido Paterno</label>
                        <input type="text" wire:model.defer="apellido_paterno" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="mb-2">
                        <label>Apellido Materno</label>
                        <input type="text" wire:model.defer="apellido_materno" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="mb-2">
                        <label>Correo</label>
                        <input type="email" wire:model.defer="correo" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="mb-2">
                        <label>Teléfono</label>
                        <input type="text" wire:model.defer="telefono" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="mb-2">
                        <label>Dirección</label>
                        <input type="text" wire:model.defer="direccion" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="mb-2">
                        <label>Estado Cliente</label>
                        <input type="text" wire:model.defer="estado_cliente" class="w-full border rounded px-2 py-1 text-black">
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" wire:click="$set('showSupplierForm', false)" class="px-4 py-2 bg-gray-400 text-white rounded">Cancelar</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
                            {{ $modalAction == 'guardarCliente' ? 'Guardar' : 'Reservar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

