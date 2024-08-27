<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
   

                 
    <div class="container">
        <h1>Permisos de Rol</h1>
        <div class="flex flex-row-reverse">

            <a href="{{ route('permisos.create')}}" class="bg-gray-100 p-2 text-black rounded-lg ">Agregar Permisos</a>
        </div>
        
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Listado de Permisos</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">#</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">Nombre del Permiso</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600">{{ $permission->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <a href="{{ route('permisos.edit', $permission->id) }}" class="text-blue-500 hover:text-blue-700">Editar</a>
                            <form action="{{ route('permisos.destroy', $permission->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 ml-4" onclick="return confirm('¿Estás seguro de eliminar este permiso?');">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    </x-app-layout>
    
    