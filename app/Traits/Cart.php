<?php

namespace App\Traits;

trait Cart{

    protected function cartkey(){
        return 'cart_' .session()->getId();
    }

    function AddOrUpdate($product, $qty=1)  {
        try {
            $cartkey=$this->cartkey();
            $cart= session()->get($cartkey,[]);

            $price = $product->price;
            $total = round($price*$qty);

            if(isset($cart[$product->id])){
                $cart[$product->id]['qty']+=$qty;
                $cart[$product->id]['total']+=$total;

            }else{
                $cart[$product->id]=[
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'qty'=>$qty,
                    'total'=>$total
                ];
            }

            session()->put($cartkey,$cart);
            return true;

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function replaceQty($product_id,$qty=1)  {
             $cartkey=$this->cartkey();
            $cart= session()->get($cartkey,[]);

            if (isset($cart[$product_id])) {
                $price =$cart[$product_id]['price'];
                $total = round($price*$qty);

                $cart[$product_id]['qty']+=$qty;
                $cart[$product_id]['total']+=$total;

                session()->put($cartkey,$cart);
                return true;
            }
    }

    function removeItemCart($product_id)  {
        $cartkey=$this->cartkey();
            $cart= session()->get($cartkey,[]);
            if (isset($cart[$product_id])) {
                unset($cart[$product_id]);
            }
            session()->put($cartkey,$cart);
    }

    function getCartItems()  {
        $cartkey=$this->cartkey();
        return session()->get($cartkey,[]);
    }

    function getTotal()  {

        try {
            $cartkey=$this->cartkey();
            $cart= session()->get($cartkey,[]);
            $total=0;
            foreach ($cart as  $product) {
                $total +=$product['total'];
            }

            return round(intval($total));
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    function totalItems()  {
        $cartkey=$this->cartkey();
            $cart= session()->get($cartkey,[]);

            return count($cart);
    }

    function clearCart()  {
        $cartkey=$this->cartkey();

        session()->froget($cartkey);
    }
}
