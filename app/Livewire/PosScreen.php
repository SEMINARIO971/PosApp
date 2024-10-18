<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Traits\Cart;
use Livewire\Component;

class PosScreen extends Component
{
    use Cart;
    public $categories;
    public $products;
    public $cart = [];
    public $search='';
    public $totalCarrito=0;
    public $totalQuetzales=0;

    public function mount()
    {
        $this->cart=$this->getCartItems();
        // dd($this->cart);
         $this->categories = Category::all();
        $this->totalCarrito=$this->totalItems();
        $this->products = Product::all();
    $this->totalQuetzales = $this->getTotal();

    }

    public function filterByCategory($categoryId)
    {
        $this->products = Product::where('category_id', $categoryId)->get();
    }

    function actualizarItemsTotal()  {
    $this->cart=$this->getCartItems();
    $this->totalCarrito=$this->totalItems();
    $this->totalQuetzales = $this->getTotal();

    }
public function removeFromCart($id){
    $this->dispatch('clg', msg: 'ingreso');

    $this->removeItemCart($id);
    $this->actualizarItemsTotal();
    $this->dispatch('toast', msg: 'Articulo eliminado del carrito', tipo:'danger');

    //$this->dispatch('refreshPage');


}
     function updateQty($id,$qty)  {
        if(intval($qty)<=0){
        $this->dispatch('toast', msg: 'Cantidad incorrecta, debe ser mayor a 0',tipo:'danger');
        return;

        }
       if ($this->replaceQty($id,intval($qty))) {
       // dd($qty);
       $this->actualizarItemsTotal();

        $this->dispatch('toast', msg: 'Cantidad actualizada');
       }
    }
    public function addToCart(Product $product)
    {
        //  dd($product);

       $mesg= $this->AddOrUpdate($product);
       $this->actualizarItemsTotal();

        $this->dispatch('toast', msg: $mesg);



    }

    function clearCartPos()  {

        $this->clearCart();

        $this->dispatch('refreshPage');
    }


    function buscar()  {
        if(strlen($this->search)>2){
            $this->products = Product::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])->get();
            // dd($this->products);

        }else{
            $this->products=Product::all();
        }
    }




    public function render()
    {
        return view('livewire.pos-screen')->layout('layouts.pos');
    }
}
