<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
   

                 
    <div class="container">
        <h1>Roles</h1>
        <div class="flex flex-row-reverse">

            <a href="{{ route('roles.create')}}" class="bg-gray-100 p-2 text-black rounded-lg ">Agregar Rol</a>
        </div>
        <h1 class="text-3xl font-bold mb-6">Lista de Roles</h1>
        
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">#</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">Nombre del Rol</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">Permisos</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm text-gray-600 font-bold">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 text-gray-600">{{ $role->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            @foreach ($role->permissions as $permission)
                                <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <form action="{{ route('roles.edit', $role->id) }}" method="GET" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                                    Editar Permisos
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </x-app-layout>
    
    