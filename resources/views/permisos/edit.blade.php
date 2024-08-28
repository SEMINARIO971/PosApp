<x-app-layout>
   

                 
    <div class="container">
        <div class="flex flex-row-reverse">

            <a href="{{ route('permisos.index')}}" class="bg-gray-100 p-2 text-black rounded-lg ">Regresar</a>
        </div>
        <h2 class="text-2xl font-bold mb-6 text-white">Editar Permiso:  <strong class="bg-orange-800 p-2"> {{ $permission->name }}</strong> </h2>

        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-semibold mb-6">Edit Permission</h1>
        
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')
        
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Permiso</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full text-gray-500 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $permission->name }}" required>
                </div>
        
                <div class="flex justify-end">
                    <a href="{{ route('permisos.index') }}" class="mr-4 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Changes</button>
                </div>
            </form>
        </div>
        
    </div>
    </x-app-layout>