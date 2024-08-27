<x-app-layout>
   

                 
    <div class="container">
        <h1>Asignar Permisos al Rol</h1>
        <div class="flex flex-row-reverse">

            <a href="{{ route('roles.index')}}" class="bg-gray-100 p-2 text-black rounded-lg ">Regresar</a>
        </div>
        <h2 class="text-2xl font-bold mb-6 text-white">Asignar Permisos a {{ $role->name }}</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-white font-medium mb-2">Permisos</label>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($permissions as $permission)
                        <div>
                            <label class="inline-flex items-center text-yellow-100">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-checkbox h-5 w-5 text-orange-700 mr-2"
                                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                                <span class="ml-2 text-yellow-200">{{ ucfirst($permission->name) }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 w-full">
                Guardar Cambios
            </button>
        </form>
        
    </div>
    </x-app-layout>