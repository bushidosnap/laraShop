<?php 
namespace App\Traits;

trait getNumbersTrait{
    
    public function getNumbers()
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

?>