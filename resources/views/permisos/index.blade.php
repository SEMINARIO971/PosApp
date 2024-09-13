<!-- resources/views/clients/index.blade.php -->
<x-app-layout>



    <div class="container">
        <h1>Permisos de Rol</h1>
        <div class="flex flex-row-reverse">

            <a href="{{ route('permisos.create')}}" class="bg-blue-900 p-2 text-white rounded-lg ">Agregar Permisos</a>
        </div>

        <h2 class="text-3xl font-bold mb-6 text-gray-800">Listado de Permisos</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-900">
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-white font-bold">#</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-white font-bold">Nombre del Permiso</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-white font-bold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600">{{ $permission->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600 flex gap-2">
                            <div>

                                <a href="{{ route('permisos.edit', $permission->id) }}" class=" bg-orange-500  text-white p-2 rounded-md hover:bg-gray-700">Editar</a>
                            </div>
                            <div>

                                <form action="{{ route('permisos.destroy', $permission->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-700 text-white rounded-md p-2 hover:bg-gray-700 hover:text-red-700 " onclick="return confirm('¿Estás seguro de eliminar este permiso?');">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </x-app-layout>

