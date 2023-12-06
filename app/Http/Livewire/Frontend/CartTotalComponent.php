<?php

namespace App\Http\Livewire\Frontend;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTotalComponent extends Component
{

    public $cart_subtotal;
    public $cart_discount;
    public $cart_tax;
    public $cart_total;

    // to update subtotal and total every time we update using increment function and decrement funtion in ..
    protected $listeners = [
        'updateCart'=>'mount'
    ]; 
    public function mount(){
        $this->cart_subtotal = Cart::instance('default')->subtotal();
        $this->cart_tax = Cart::Instance('default')->tax();
        $this->cart_total = Cart::Instance('default')->total();

    }
    public function mountUpdate(){

        $this->cart_subtotal = Cart::instance('default')->subtotal();
        $this->cart_tax = Cart::Instance('default')->tax();
        $this->cart_total = Cart::Instance('default')->total();
    }

    public function render()
    {
        return view('livewire.frontend.cart-total-component');
    }
}