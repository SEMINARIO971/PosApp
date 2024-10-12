<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class PosScreen extends Component
{
    public $categories;
    public $products;
    public $cart = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->products = Product::all();
    }

    public function filterByCategory($categoryId)
    {
        $this->products = Product::where('category_id', $categoryId)->get();
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        $this->cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ];
    }


    public function render()
    {
        return view('livewire.pos-screen')->layout('layouts.pos');
    }
}
