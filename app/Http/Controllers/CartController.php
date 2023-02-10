<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $items = \Cart::getContent();
        return view('cart.cart',['items' => $items]);
    }

    public function addCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->url_img
            )
        ]);
        return redirect('cart')->with('success', 'Produto adicionado com sucesso!');
    }
    public function cartRemove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect('cart')->with('success', 'Produto removido com sucesso!');
    }
    public function cartUpdate(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity)
            ]
        ]);
        return redirect('cart')->with('success', 'Produto atualizado com sucesso!');
    }
    
}
