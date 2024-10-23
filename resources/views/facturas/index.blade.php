<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura {{ $venta->Factura }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 100px;
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

    <div style="display: flex; flex-direction: row;">
        <img src="{{ $storeData['logo'] }}" width="100px" height="100px" alt="Logo" class="logo">
        <h3>{{ $storeData['slogan'] }}</h3>
        <span style="color:blue; font-size:20px">Datos del Cliente</span>
        <table>
            <thead>
                <tr>

                    <td>NIT: {{ $storeData['nit'] }}</td>
                    <td>Factura A-{{ $venta->id }}</td>
                </tr>
                <tr>
                    <td>Nombre del Cliente: {{ $venta->NombreCliente }}</td>
                    <td>NIT Cliente: {{ $venta->Nit }}</td>
                </tr>
                <tr>
                    <td>Teléfono: {{ $venta->Telefono }}</td>
                    <td>Dirección: {{ $venta->Direccion }}</td>
                </tr>
            </thead>
        </table>
    </div>

    <span style="margin-top: 4px; color:blue; font-size:20px">Items</span>
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
<div style="background-color: rgb(248, 238, 182); display:flex; padding:8px;">
<img src="{{ $storeData['logoUmg']}}" width="75" alt="">
<span style="color: white">Diseñado Por: </span>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Carnet</th>


        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Rudy Moran</td>
            <td>1790-19-21878</td>
        </tr>
        <tr>
            <td>Juan de la Cruz</td>
            <td>1790-20-3374</td>
        </tr>
        <tr>
            <td>Edwin Galicia</td>
            <td>1790-15-12266</td>
        </tr>
        <tr>
            <td>Kevin Santos</td>
            <td>1790-19-19560</td>
        </tr>
        <tr>
            <td>Jackeline Godoy</td>
            <td>1790-20-20265</td>
        </tr>
        <tr>
            <td>Eliezer Taracena</td>
            <td>1790-15-19864</td>
        </tr>
        <tr>
            <td>Jeremy Rodriguez</td>
            <td>1790-20-20725</td>
        </tr>
        <tr>
            <td>Hector Giron</td>
            <td>1790-16-11092</td>
        </tr>
    </tbody>
</div>
</body>
</html>
