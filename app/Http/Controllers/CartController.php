<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;  // Assuming this model exists
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Create or update an item in the cart (product or accessory)
        $item = Item::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $request->input('product_id'),
                'accessory_id' => $request->input('accessory_id'),
            ],
            [
                'quantity' => $request->input('quantity', 1),
                'price' => $request->input('price'),
            ]
        );

        return response()->json($item);
    }

    public function getCart()
    {
        // Fetch the current user's cart with items
        $cart = Cart::with('items.product', 'items.accessory')->where('user_id', auth()->id())->first();
        return response()->json($cart);
    }

   
}
