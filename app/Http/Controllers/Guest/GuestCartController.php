<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuestCartController extends Controller
{
    //
    public function showCart(Request $request)
    {
        $sessionData = $request->session()->get('session_data');
        // $SessionItemId = array_column($SessionData, 'SessionItemId');
        // $SessionItemQuantity = array_column($SessionData, 'SessionItemQuantity');

        return view('guest.cart', compact('sessionData'));
    }

    public function addCart(Request $request)
    {
        $SessionItemId = $request->item_id;
        $SessionItemQuantity = $request->quantity;
        $SessionData = array();
        $SessionData = compact("SessionItemId", "SessionItemQuantity");

        // セッションに登録
        $request->session()->push('session_data', $SessionData);

        return redirect()->route('guest.cart');
    }
}
