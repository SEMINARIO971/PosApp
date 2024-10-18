<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Venta;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()  {
        $salesData = Venta::selectRaw('SUM("Total") as total, DATE(created_at) as date')
        ->groupBy('date')
        ->orderBy('date')
        ->get();
    return view('dashboard',[
        'salesData'=>$salesData,
        'productData'=>$this->productReport(),
    ]);
    }

    public function productReport()
{
    // Obtener los productos junto con su stock desde la tabla inventory
    $products = Product::with('inventory')->get();

    // Crear un array para almacenar los nombres y cantidades
    $productData = [];

    foreach ($products as $product) {
        // Asegúrate de que la relación inventory esté definida en el modelo Product
        $productData[$product->name] = $product->inventory->stock ?? 0; // Usa 0 si no hay stock
    }

    // Devuelve la vista con los datos
    return $productData;

}
}
