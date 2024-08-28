<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
   

                 
    <div class="container">
        <h1>Usuarios</h1>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-right mb-6">
            <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Crear Usuario
            </a>
        </div>
        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="w-1/4 px-4 py-2">ID</th>
                    <th class="w-1/4 px-4 py-2">Nombre</th>
                    <th class="w-1/4 px-4 py-2">Correo Electrónico</th>
                    <th class="w-1/4 px-4 py-2">Rol Actual</th>
                    <th class="w-1/4 px-4 py-2">Asignar Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td class="border px-4 py-2 text-gray-700">{{ $user->id }}</td>
                        <td class="border px-4 py-2 text-gray-700">{{ $user->name }}</td>
                        <td class="border px-4 py-2 text-gray-700">{{ $user->email }}</td>
                        <td class="border px-4 py-2 text-gray-700">
                            {{ $user->roles->pluck('name')->implode(', ') ?: 'Sin Rol' }}
                        </td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('users.assignRole', $user->id) }}" method="POST">
                                @csrf
                                <select name="role" class="p-1 rounded text-gray-600">
                                    <option value="">Seleccione un Rol</option>

                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Asignar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    </x-app-layout>
    
    