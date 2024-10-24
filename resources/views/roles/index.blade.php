<!-- resources/views/clients/index.blade.php -->
<x-app-layout>



    <div class="container">
        @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif
        <div class="flex flex-row-reverse">


            <a href="{{ route('roles.create')}}" class="bg-blue-900 p-2 text-white rounded-lg ">Agregar Rol</a>
        </div>
        <h1 class="text-3xl font-bold mb-6">Lista de Roles</h1>
        <div class="overflow-x-auto">
        <table class="min-w-full ">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-white font-bold">#</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-white font-bold">Nombre del Rol</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-white font-bold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600 dark:text-white">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600 dark:text-white">{{ $role->name }}</td>


                        <td class="py-2 px-4 border-b border-gray-300">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este rol?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-600">Eliminar </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </x-app-layout>

