<x-app-layout>
    @if(auth()->user())
    <p class="bg-orange-600 text-white p-4 text-2xl font-bold mb-4">Tu rol es: {{ auth()->user()->getRoleNames()->first() }}</p>
    @endif


        {{-- @if($role->hasPermissionTo('nombre-del-permiso'))
            <p>El rol tiene el permiso "nombre-del-permiso".</p>
            @else
            <p>El rol no tiene el permiso "nombre-del-permiso".</p>
        @endif --}}


    <livewire:reportes-livewire lazy />
    <div class="flex justify-around bg-gray-300 p-2">

        <div class="bg-gray-100">

            <canvas id="salesChart" width="400" height="400"></canvas>
        </div>
        <div class="bg-gray-100">
            <canvas id="productChart" width="400" height="400"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

    document.addEventListener('DOMContentLoaded', function () {
        // Convertir la propiedad de Livewire a un formato de JavaScript
        const salesData = @json($salesData);

        //para el reporte
        const productData = @json($productData);
        console.log(productData);
        const labels = Object.keys(productData);
        const data = Object.values(productData);
        const ctxP = document.getElementById('productChart').getContext('2d');
            const chartProducto = new Chart(ctxP, {
                type: 'bar', // O 'pie', según tus necesidades
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Cantidad de productos en inventario',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Stock de productos'
                    }
                }
                }
            });

        //fin de lo del reporte
        // Ahora puedes usar salesData en JavaScript
        console.log(salesData); // Muestra los datos en la consola

        // Por ejemplo, puedes inicializar gráficos u otras funcionalidades
        const ctx = document.getElementById('salesChart');
        const myChart = new Chart(ctx, {
            type: 'pie', // Cambia el tipo según tus necesidades
            data: {
                labels: salesData.map(sale => sale.date), // Fechas como etiquetas
                datasets: [{
                    label: 'Ventas',
                    data: salesData.map(sale => sale.total), // Totales como datos
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Ventas por Fecha'
                    }
                }
            }
        });
    });
</script>
</x-app-layout>
