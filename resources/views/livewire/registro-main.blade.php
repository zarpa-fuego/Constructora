    <div class="p-6 bg-gray-100">
        <!-- Encabezado -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Gestión de Lotes</h1>
            <p class="text-gray-600">Administra y visualiza todos los lotes del proyecto</p>
        </div>

        <!-- Contenedor principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Mapa de Lotes -->
            <div class="lg:col-span-2 bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Mapa de Lotes</h2>
                <img src="https://imgv2-1-f.scribdassets.com/img/document/281114067/original/56fef6d35d/1?v=1" alt="Mapa de Lotes" class="w-full rounded-lg">
                <div class="flex justify-between mt-4 text-sm">
                    <span class="text-green-600">Disponible</span>
                    <span class="text-yellow-600">Reservado</span>
                    <span class="text-red-600">Vendido</span>
                </div>
            </div>

            <!-- Estadísticas y Acciones -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Estadísticas de Lotes</h2>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <p class="text-sm text-gray-600">Total de Lotes</p>
                        <p class="text-xl font-bold text-gray-800">124</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Lotes Disponibles</p>
                        <p class="text-xl font-bold text-green-600">78</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Ocupación</p>
                        <p class="text-xl font-bold text-yellow-600">37%</p>
                    </div>
                </div>
                <div class="mb-4">
                    <h3 class="text-sm font-bold text-gray-800 mb-2">Acciones Rápidas</h3>
                    <a href="{{ route('registrode-ventas') }}" class="w-full bg-black text-white rounded-lg py-2 mb-2 block text-center">
                        Gestionar Reservas
                    </a>
                    <button class="w-full bg-black text-white rounded-lg py-2 mb-2">Registrar Venta</button>
                    <button class="w-full bg-black text-white rounded-lg py-2">Generar Informes</button>
                </div>
            </div>
        </div>

        <!-- Tabla de Lotes -->
        <div class="mt-6 bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Listado de Lotes</h2>
            <div class="flex justify-between mb-4">
                <input type="text" placeholder="Buscar lote..." class="border rounded-lg px-4 py-2 w-1/2">
                <select class="border rounded-lg px-4 py-2">
                    <option>Todos los estados</option>
                    <option>Disponible</option>
                    <option>Reservado</option>
                    <option>Vendido</option>
                </select>
            </div>
            <table class="w-full border-collapse">
                <thead class="bg-indigo-500 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Código</th>
                        <th class="px-4 py-2 text-left">Ubicación</th>
                        <th class="px-4 py-2 text-left">Área (m²)</th>
                        <th class="px-4 py-2 text-left">Precio</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-black">
                    <tr class="border-b">
                        <td class="px-4 py-2">L-001</td>
                        <td class="px-4 py-2">Sector A, Manzana 1</td>
                        <td class="px-4 py-2">250</td>
                        <td class="px-4 py-2">$75,000</td>
                        <td class="px-4 py-2 text-green-600">Disponible</td>
                        <td class="px-4 py-2">Ninguna</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">L-002</td>
                        <td class="px-4 py-2">Sector A, Manzana 1</td>
                        <td class="px-4 py-2">300</td>
                        <td class="px-4 py-2">$90,000</td>
                        <td class="px-4 py-2 text-yellow-600">Reservado</td>
                        <td class="px-4 py-2">Ninguna</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2">L-003</td>
                        <td class="px-4 py-2">Sector A, Manzana 2</td>
                        <td class="px-4 py-2">280</td>
                        <td class="px-4 py-2">$84,000</td>
                        <td class="px-4 py-2 text-red-600">Vendido</td>
                        <td class="px-4 py-2">Ninguna</td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 flex justify-center">
                <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">1</button>
                <button class="px-4 py-2 bg-gray-200 rounded-lg">2</button>
                <button class="px-4 py-2 bg-gray-200 rounded-lg">3</button>
                <button class="px-4 py-2 bg-gray-200 rounded-lg">...</button>
            </div>
        </div>
    </div>
