<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponsController extends Controller
{
    public function store(Request $request)
    {
       $coupon = Coupon::where('code', $request->coupon_code)->first();

       if(!$coupon){
           return redirect()->route('cart.index')->with('toast_error', 'Invalid coupon code, please try again!');
       }

       session()->put('coupon',[
            'name' => $coupon->code,
            'discount' =>$coupon->discount(\Cart::subtotal()),
       ]);
       return redirect()->route('cart.index')->with('toast_success', 'Coupon has been applied!');


    }

    public function destroy()
    {
        session()->forget('coupon');
        return redirect()->route('cart.index')->with('toast_success', 'Coupon has been removed!');
    }
}
