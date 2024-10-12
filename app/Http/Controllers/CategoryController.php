<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
        public function index()
    {
        $categories = Category::all();
        return view('categorias.index', compact('categories'));
    }

    public function create()
    {
        return view('categorias.create');
    }

        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;  // Si no se sube ninguna imagen
        }
        Category::create([
            'name' => $request->name,
            'image' => $imageName, // Guardar el nombre de la imagen en la base de datos
        ]);
        return redirect()->route('categorias.index')
                        ->with('success', 'Categoria creada!!.');
    }

    public function edit(Category $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria)
    {
        // dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validación para la imagen
        ]);
// dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
            // dd('ingreso');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;  // Si no se sube ninguna imagen
        }
        $categoria->name = $request->name;
        $categoria->image= $imageName;
        $categoria->save();

        return redirect()->route('categorias.index')
                        ->with('success', 'Categoria actualizada!!.');
    }

    public function destroy(Category $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
                        ->with('success', 'Category eliminada!!.');
    }



}
