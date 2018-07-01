<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'pending';
    	$cart->save();

    	$notification = 'tu pedido se ha registrado correctamente';

    	return back()->with(compact('notification'));
    }
}
