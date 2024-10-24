<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Venta;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ReporteController extends Controller
{
    public function index()  {
        $role= Role::with('permissions')->get();
        $salesData = Venta::selectRaw('SUM("Total") as total, DATE(created_at) as date')
        ->groupBy('date')
        ->orderBy('date')
        ->get();
    return view('dashboard',[
        'salesData'=>$salesData,
        'productData'=>$this->productReport(),
        'role'=>$role
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
