<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura {{ $venta->Factura }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        .logo {
            width: 250px; /* Ajusta según sea necesario */
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div>
        <img src="{{ $storeData['logo'] }}" alt="Logo" class="logo">
        <h3>{{ $storeData['slogan'] }}</h3>
        <h4>NIT: {{ $storeData['nit'] }}</h4>
        <h4>Factura A-{{ $venta->id }}</h4>
        <h4>Nombre del Cliente: {{ $venta->NombreCliente }}</h4>
        <h4>NIT Cliente: {{ $venta->Nit }}</h4>
        <h4>Teléfono: {{ $venta->Telefono }}</h4>
        <h4>Dirección: {{ $venta->Direccion }}</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta->detalles as $detalle)
                <tr>
                    <td>{{ $detalle->producto->name }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>Q. {{ number_format($detalle->precio, 2) }}</td>
                    <td>Q. {{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: Q. {{ number_format($venta->Total, 2) }}</h4>
<div style="background-color: gray; display:flex; padding:8px;">
<img src="{{ $storeData['logoUmg']}}" width="75" alt="">
<span style="color: white">Diseñado Por: Grupo # Alumnos Rudy Moran, Etc., Etc,.</span>
</div>
</body>
</html>
