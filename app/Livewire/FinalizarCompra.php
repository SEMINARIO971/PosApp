<?php

namespace App\Livewire;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Traits\Cart;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FinalizarCompra extends Component
{
    use Cart;
    public $cartItems=[];
    public $totalQuetzales=0;
    public $numeroFactura=0;

    public $NombreCliente;
    public $Nit;
    public $Telefono;
    public $Direccion;
    public $Factura;

function finalizar()  {
    $this->validate([
        'NombreCliente' => 'required|string|max:255',
        'Nit' => 'required|string|max:20',
        'Telefono' => 'required|string|max:15',
        'Direccion' => 'required|string|max:255',
    ]);


    try {
    // Crear la venta
    $venta=Venta::create([
        'NombreCliente' => $this->NombreCliente,
        'Nit' => $this->Nit,
        'Telefono' => $this->Telefono,
        'Direccion' => $this->Direccion,
        'Factura' => 'A-' .$this->numeroFactura+1, // Generar una factura única
        'Total' =>  $this->totalQuetzales, // O el total que sea apropiado
    ]);
// dd($venta);

    foreach ($this->cartItems as $item) {

        $detalle=DetalleVenta::create([
            'product_id' => $item['id'],
            'venta_id' => $venta->id,
            'cantidad' => $item['qty'],
            'precio' => $item['price'],
        ]);

        // dd($detalle);

    }

    $this->clearCart();
    $this->reset();
    return redirect()->to('/pos');


} catch (\Exception $e) {
    // Si hay un error, revertir la transacción
    $this->dispatch('clg',msg:$e);
    dd($e);




}
}
    public function render()
    {
        $this->numeroFactura=Venta::count();
        $this->cartItems=$this->getCartItems();
        // dd($this->cartItems);
        $this->totalQuetzales = $this->getTotal();
        return view('livewire.finalizar-compra')->layout('layouts.pos');
    }

}
