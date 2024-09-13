<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'variants', 'inventory')->get();
        return view('productos.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('productos.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock'=>'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,JPEG,JPG|max:2048', // Validación para la imagen
        ]);
           // Manejo de la imagen
    if ($request->hasFile('img')) {
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
    } else {
        $imageName = null;  // Si no se sube ninguna imagen
    }

    // Crear el producto
    $product=Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'img' => $imageName, // Guardar el nombre de la imagen en la base de datos
    ]);
        Inventory::create([
            'product_id' => $product->id,
            'stock' => $request->stock
        ]);
        return redirect()->route('productos.index')->with('success', 'Producto creado!!.');
    }

    public function edit(Product $producto)
    {
        $categories = Category::all();
        return view('productos.edit', compact('producto', 'categories'));
    }

    public function update(Request $request,  $id)
    {
        $product = Product::findOrFail($id);
        // dd($product);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'stock'=>'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($product);
        // Manejo de la imagen
        if ($request->hasFile('img')) {
            // Eliminar la imagen anterior si existe
            if ($product->img && file_exists(public_path('images/' . $product->img))) {
                unlink(public_path('images/' . $product->img));
            }

            // Guardar la nueva imagen
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('images'), $imageName);
            $product->img = $imageName;
        }

        // Actualizar los otros campos
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'img' => $product->img ?? $product->img,  // Mantener la imagen anterior si no se sube una nueva
        ]);
        $inventory = $product->inventory;
        if ($inventory) {
            $inventory->update(['stock' => $request->stock]);
        } else {
            Inventory::create([
            'product_id' => $product->id,
            'stock' => $request->stock
            ]);
        }
        return redirect()->route('productos.index')->with('success', 'Producto acutalizado!!.');
    }

    public function destroy( $id)
    {
        $product = Product::find($id);
            if ($product) {
                $product->delete();
            }
            return redirect()->route('productos.index')->with('success', 'Producto Eliminado!!.');

    }
}
