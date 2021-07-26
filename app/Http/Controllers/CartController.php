<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\Validator;
use App\Traits\getNumbersTrait;


use Illuminate\Http\Request;

class CartController extends Controller
{
    use getNumbersTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = $this->getNumbers()->get('discount');
        $newSubtotal = $this->getNumbers()->get('newSubtotal');
        $newTax = $this->getNumbers()->get('newTax');
        $newTotal = $this->getNumbers()->get('newTotal');
        $mightAlsoLike = Product::MightAlsoLike()->get();

        return view('cart',compact('mightAlsoLike', 'discount', 'newSubtotal', 'newTax', 'newTotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicates = \Cart::search(function($cartItem, $rowId) use($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('toast_success', 'Item is already in your Cart!');
        }else{
            \Cart::add($request->id, $request->name, 1 , $request->price)->associate('App\Models\Product');
    
            return redirect()->route('cart.index')->with('toast_success', "Item added to your Cart!");
        }
    }

    public function wishList($id)
    {

        $item = \Cart::get($id);

        \Cart::remove($id);

        $duplicates = \Cart::instance('wishList')->search(function($cartItem, $rowId) use($id){
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('toast_success', 'Item is already in your Cart!');
        }else{
            \Cart::instance('wishList')->add($item->id, $item->name, 1 , $item->price)->associate('App\Models\Product');
        
            return redirect()->route('cart.index')->with('toast_success', "Item added to your Wish List!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if($validator->fails()){
            session()->flash('toast_error', collect(['Quantity must be between 1 to 5.']));
        }

        \Cart::update($id,$request->quantity);
        session()->flash('toast_success',"Item quantity updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Cart::remove($id);

        return back()->with('toast_success', "Item removed to your Cart!");
    }

    public function wishListDestroy($id)
    {
        \Cart::instance('wishList')->remove($id);

        return back()->with('toast_success', "Item removed to your Wish List!");
    }

    public function switchToCart($id)
    {
        $item = \Cart::instance('wishList')->get($id);

        \Cart::instance('wishList')->remove($id);

        $duplicates = \Cart::instance('default')->search(function($cartItem, $rowId) use($id){
            return $rowId === $id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->route('cart.index')->with('toast_success', 'Item is already in your Cart!');
        }else{

            \Cart::instance('default')->add($item->id, $item->name, 1 , $item->price)->associate('App\Models\Product');
        
             return redirect()->route('cart.index')->with('toast_success', "Item moved to your Cart!");
        }

        
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') /100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (\Cart::subtotal() - $discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal,
        ]);
    }

    
}
