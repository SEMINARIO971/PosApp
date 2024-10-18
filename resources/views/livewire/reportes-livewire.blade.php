<div>
    <div class="flex justify-between">
        <select wire:model.live="selectedPeriod" class="border p-2">
            <option value="day">Hoy</option>
            <option value="week">Esta Semana</option>
            <option value="month">Este Mes</option>
        </select>
    </div>

    <div class="mt-4">
        @if(empty($sales))
            <p>No hay ventas en este periodo.</p>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">ID Venta</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Cliente</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">NIT</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">No. Factura</th>
                        <th class="px-4 py-2 text-right text-gray-600 font-semibold">Total</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-semibold">Fecha</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($sales as $sale)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2 text-gray-700">{{ $sale->id }}</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $sale->NombreCliente }}</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $sale->Nit }}</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $sale->Factura }}</td>
                            <td class="border px-4 py-2 text-right text-gray-700">{{ $sale->Total }}</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

</div>
