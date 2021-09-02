<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Models\Product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use App\Traits\getNumbersTrait;

class CheckoutController extends Controller
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

        return view('checkout',compact('discount','newSubtotal','newTax','newTotal'));
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
    public function store(CheckoutRequest $request)
    {
        $contents = \Cart::content()->map(function($item){
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try {
            
            $transaction = Stripe::charges()->create([
                'amount' => $this->getNumbers()->get('newTotal') / 100,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => \Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson(),
                ],
            ]);

            //successful
            \Cart::instance('default')->destroy();
            session()->forget('coupon');
            return view('confirmation')->with('success', 'Your Purchase has been successfully accepted');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! '.$e->getMessage());
        }
    }

    public function confirmation()
    {
        return view('confirmation')->with('toast_success', 'Your Purchase has been successfully accepted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
