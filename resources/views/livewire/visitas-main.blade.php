<div class="bg-gray-100 min-h-screen p-6">
    <div class="flex gap-4 mb-6">
        <div class="bg-indigo-100 border-l-4 border-indigo-500 text-indigo-700 p-4 rounded w-1/2">
            <div class="font-bold text-lg">Visitas creadas</div>
            <div class="text-3xl font-extrabold">{{ $visitas->count() }}</div>
        </div>
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 rounded w-1/2">
            <div class="font-bold text-lg">Agente Comercial</div>
            <div class="text-3xl font-extrabold">
                {{ Auth::user()->name }}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="flex flex-col gap-6">
<div class="bg-white rounded-lg shadow p-4 mb-6 max-w-md">
    <h2 class="font-bold text-lg mb-4 text-black">Calendario de Reservas</h2>
    <div class="mb-2 text-center text-black font-semibold">Julio 2025</div>
    <table class="w-full text-center text-xs text-black">
        <thead>
            <tr>
                <th class="py-1">Dom</th>
                <th class="py-1">Lun</th>
                <th class="py-1">Mar</th>
                <th class="py-1">Mié</th>
                <th class="py-1">Jue</th>
                <th class="py-1">Vie</th>
                <th class="py-1">Sáb</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-gray-400">29</td>
                <td class="text-gray-400">30</td>
                <td class="bg-blue-200 rounded-full font-bold">1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>
            <tr>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
            </tr>
            <tr>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
            </tr>
            <tr>
                <td>20</td>
                <td>21</td>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
            </tr>
            <tr>
                <td>27</td>
                <td>28</td>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                <td class="text-gray-400">1</td>
                <td class="text-gray-400">2</td>
            </tr>
        </tbody>
    </table>
    <div class="text-xs mt-4 text-black">
        <span class="inline-block w-3 h-3 bg-blue-500 rounded-full mr-1"></span> Pendiente
        <span class="inline-block w-3 h-3 bg-indigo-500 rounded-full mx-2"></span> En proceso
        <span class="inline-block w-3 h-3 bg-green-500 rounded-full mx-2"></span> Confirmada
        <span class="inline-block w-3 h-3 bg-red-500 rounded-full mx-2"></span> Por vencer
    </div>
</div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="font-bold text-lg mb-2 text-black">Estadísticas de Reservas</h2>
                <div class="flex justify-between text-sm mb-2 text-black">
                    <span>Reservas activas</span>
                    <span class="font-bold text-blue-600">8 de 20</span>
                </div>
                <div class="flex justify-between text-sm mb-2 text-black">
                    <span>Reservas por vencer</span>
                    <span class="font-bold text-red-600">2 de 8</span>
                </div>
                <div class="flex justify-between text-sm mb-2 text-black">
                    <span>Conversión a ventas</span>
                    <span class="font-bold text-green-600">75%</span>
                </div>
                <div class="mt-2">
                    <div class="h-20 bg-gray-200 rounded flex items-end gap-1">
                        <div class="w-2 bg-gray-400 h-2"></div>
                        <div class="w-2 bg-gray-400 h-6"></div>
                        <div class="w-2 bg-gray-400 h-10"></div>
                        <div class="w-2 bg-gray-400 h-8"></div>
                        <div class="w-2 bg-gray-400 h-12"></div>
                        <div class="w-2 bg-gray-400 h-6"></div>
                        <div class="w-2 bg-gray-400 h-4"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="font-bold text-lg mb-4 text-black">Registrar Nueva Visita</h2>
                <form wire:submit.prevent="{{ $editId ? 'updateVisita' : 'guardarVisita' }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-black">Nombre</label>
                            <input type="text" wire:model="nombre" class="w-full border rounded px-2 py-1 text-black" placeholder="Nombre del visitante">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Apellido</label>
                            <input type="text" wire:model="apellido" class="w-full border rounded px-2 py-1 text-black" placeholder="Apellido del visitante">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Teléfono</label>
                            <input type="text" wire:model="telefono" class="w-full border rounded px-2 py-1 text-black" placeholder="Teléfono">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Email</label>
                            <input type="email" wire:model="email" class="w-full border rounded px-2 py-1 text-black" placeholder="Correo electrónico">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Empresa</label>
                            <input type="text" wire:model="empresa" class="w-full border rounded px-2 py-1 text-black" placeholder="Empresa (opcional)">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Motivo de la Visita</label>
                            <input type="text" wire:model="motivo" class="w-full border rounded px-2 py-1 text-black" placeholder="Motivo">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Fecha y Hora</label>
                            <input type="datetime-local" wire:model="fecha" class="w-full border rounded px-2 py-1 text-black">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-black">Documento de Identidad</label>
                            <input type="text" wire:model="documento_identidad" class="w-full border rounded px-2 py-1 text-black" placeholder="Documento (opcional)">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-black">Agente Comercial</label>
                            <input type="text" class="w-full border rounded px-2 py-1 text-black bg-gray-100" value="{{ Auth::user()->name }}" readonly>
                            <input type="hidden" wire:model="agente_comercial_id" value="{{ Auth::id() }}">
                        </div>
                    </div>
                    <div class="flex items-center mt-6 gap-4">
                        @if($editId)
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800">Actualizar Visita</button>
                            <button type="button" wire:click="$set('editId', null)" class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-600">Cancelar</button>
                        @else
                            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-700">Crear Visita</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mx-6 mb-4 mt-8">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-black">Visitas Registradas</h2>
        <div class="border-b-2 border-indigo-600 w-60 mt-2"></div>
    </div>
    <div class="flex items-center p-2 rounded-md flex-1">
        <label class="w-full relative text-gray-400 focus-within:text-gray-600 block">
            <svg class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 25 25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <x-input type="text" wire:model="search" class="w-full block pl-14" placeholder="Buscar elemento..."/>
        </label>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl border-1 sm:rounded-lg px-4 py-4 dark:bg-gray-800/50 dark:bg-gradient-to-bl">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-indigo-500 text-white">
                        <tr class="text-left text-xs font-bold uppercase">
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Apellido</th>
                            <th class="px-6 py-3">Teléfono</th>
                            <th class="px-6 py-3">Motivo</th>
                            <th class="px-6 py-3">Fecha</th>
                            <th class="px-6 py-3">Agente Comercial</th>
                            <th class="px-6 py-3 text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visitas as $visita)
                            <tr>
                                <td class="px-6 py-2">{{ $visita->nombre }}</td>
                                <td class="px-6 py-2">{{ $visita->apellido }}</td>
                                <td class="px-6 py-2">{{ $visita->telefono }}</td>
                                <td class="px-6 py-2">{{ $visita->motivo }}</td>
                                <td class="px-6 py-2">{{ $visita->fecha }}</td>
                                <td class="px-6 py-2">
                                     {{ optional($visita->agenteComercial)->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-2 text-center">
                                    <button wire:click="editVisita({{ $visita->id }})" class="inline-flex items-center px-2 py-1 bg-blue-600 text-white rounded-full hover:bg-blue-800 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h6" />
                                        </svg>
                                    </button>
                                    <button wire:click="deleteVisita({{ $visita->id }})" class="inline-flex items-center px-2 py-1 bg-red-600 text-white rounded-full hover:bg-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-400">No hay visitas para mostrar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Scripts - Sweetalert -->
@push('js')
    <script>
      Livewire.on('deleteItem',id=>{
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                //console.log(id);
                //alert(id);
                Livewire.dispatch('delItem',{visitas:id});
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )

            }
          })
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script>
        document.addEventListener('livewire:load', function() {
            var calendarEl = document.getElementById('calendar');
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    height: 350,
                    now: new Date(),
                    events: @json($eventos ?? []),
                });
                calendar.render();
            }
        });
    </script>
  @endpush

