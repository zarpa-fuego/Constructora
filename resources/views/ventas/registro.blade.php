@extends('base.base')
@section('content')
    <main class="content">
        <div class="p-6 bg-gray-100">
            <!-- Encabezado -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Registro de Ventas de Lotes</h1>
                <div class="flex space-x-4">
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-400">Nueva Venta</button>
                    <button class="px-4 py-2 border border-blue-800 rounded-lg hover:bg-blue-300 text-blue-800">Exportar</button>
                </div>
            </div>

            <!-- Formulario de Registro -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Registrar Nueva Venta</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Seleccionar Lote -->
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Seleccionar Lote</label>
                        <select class="w-full border rounded-lg px-4 py-2  text-black">
                            <option>Seleccione un lote disponible</option>
                            <option>L-001</option>
                            <option>L-002</option>
                            <option>L-003</option>
                        </select>
                    </div>

                    <!-- Área y Precio Base -->
                    <div class="col-span-1 grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Área (m²)</label>
                            <input type="text" value="250" class="w-full border rounded-lg px-4 py-2  text-black" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Precio Base</label>
                            <input type="text" value="$45,000.00" class="w-full border rounded-lg px-4 py-2  text-black" readonly>
                        </div>
                    </div>

                    <!-- Ubicación -->
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ubicación</label>
                        <textarea class="w-full border rounded-lg px-4 py-2 text-black  " rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

