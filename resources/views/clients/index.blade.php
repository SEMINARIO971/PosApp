<!-- resources/views/clients/index.blade.php -->
<x-app-layout>
   

                 
<div class="container">
    <h1>Clientes</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Add Client</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>

                <th>DPI</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td><img src="/storage/{{ $client->img }}" width="64px" alt=""></td>

                <td>{{ $client->dpi }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->latitude }}</td>
                <td>{{ $client->longitude }}</td>
                <td>
                    <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>

