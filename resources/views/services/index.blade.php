<x-app-layout>
   

                 
    <div class="container">
        <h1>Servicios</h1>
        
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">Client ID</th>
                    <th class="py-3 px-6 text-left">Service Type</th>
                    <th class="py-3 px-6 text-left">Cost</th>
                    <th class="py-3 px-6 text-left">Service Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $service)
                    <tr class="border-b">
                        <td class="py-3 px-6">{{ $service['client_id'] }}</td>
                        <td class="py-3 px-6">{{ $service['service_type'] }}</td>
                        <td class="py-3 px-6">{{ $service['cost'] }}</td>
                        <td class="py-3 px-6">{{ $service['service_date'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>