<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use PDF;

class FacturaController extends Controller
{
    public function generateInvoice($ventaId)
    {
        // Obtener la venta con el ID
        $venta = Venta::with('detalles.producto')->findOrFail($ventaId); // Asegúrate de tener la relación en el modelo
// dd($venta);
        // Datos de la tienda
        $storeData = [
            'logo' => public_path('img/logoModa.png'),
            'logoUmg' => public_path('img/umg.webp'), // Ruta del logo
            // Ruta del logo
            'slogan' => 'Gracias por su Compra',
            'nit' => '908765-3',
        ];

        // Generar el PDF
        $pdf = PDF::loadView('facturas.index', compact('venta', 'storeData'));

        // Retornar el PDF como descarga
        return $pdf->download('factura-' . $venta->id . '.pdf');
    }
}
