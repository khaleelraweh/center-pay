<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Coupon;
use App\Models\PaymentCategory;
use App\Models\PaymentMethodOffline;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CheckoutComponent extends Component
{

    use LivewireAlert;

    public $cart_subtotal; 
    public $cart_tax;
    public $cart_tax_Text;
    public $cart_total;
    
    public $coupon_code;
    public $cart_discount;

    public $payment_categories;            
    public $payment_category_id = 0;      

    public $payment_methods;            // array hold all payment methods from PaymentMethod model called in mount
    public $payment_method_id = 0;      // hold choosen payment_method_id from input radio
    public $payment_method_code;


    protected $listeners = [
        'updateCart'=>'mount'
    ];

    public function mount(){

        $this->payment_category_id = session()->has('saved_payment_category_id') ? session()->get('saved_payment_category_id') :'';
        $this->payment_method_id = session()->has('saved_payment_method_id') ? session()->get('saved_payment_method_id') :'';

        // access all addresses related to customer
        $this->cart_subtotal    = getNumbers()->get('subtotal');
        $this->cart_tax         = getNumbers()->get('productTaxes');
        $this->cart_tax_Text    = getNumbers()->get('taxText');
        $this->cart_discount    = getNumbers()->get('discount');
        $this->cart_total       = getNumbers()->get('total');
        
        // get all payment category to payment_methods prop to use it in view
        $this->payment_categories = PaymentCategory::whereStatus(true)->get();


        if($this->payment_category_id == ''){
            $this->payment_methods = collect([]);
        }else{
            $this->updatePaymentMethodOffline(); 

        }


    }


    public function applyDiscount(){
        
        //check if the getNumbers()->get('subtotal') > 0 means there are product in the cart
        if( getNumbers()->get('subtotal') > 0 ){

            // Get coupon infrom from db using coupon_code came from view livewire /checkout-component.blade.php
            $coupon = Coupon::whereCode($this->coupon_code)->whereStatus(true)->first();
            
            // if there is no coupon came from db equil by query above 
            if(!$coupon){

                // give alert and make coupon_code as null for getting new coupon
                $this->coupon_code = '';
                $this->alert('error', 'Coupon is invalid !');

            }else{
                
                // if there is coupon in db then use discount function from model to get the discount to cart_subtotal 
                $couponValue = $coupon->discount($this->cart_subtotal);
                
                // if discount came right and bigger than zero then 
                if($couponValue > 0){

                    // make the session of coupon to use in general helper in getNumbers() function and view
                    session()->put('coupon', [
                        'code' => $coupon->code , 
                        'value' => $coupon->value, // maybe is percentage or fixed
                        'discount' => $couponValue // get only discount in fixed came from discount function in the productCouponModel
                    ]); 

                    $this->coupon_code = session()->get('coupon')['code'];
                    $this->emit('updateCart');
                    
                    $this->alert('success','coupon is applied successfully');

                } else if($couponValue == 0){ // means checkDate() says date is expired
                    $this->alert('error','product coupon is invalid or expired');
                }else{ // means checkUsedTimes() in productCoupon model says we losed all try of coupon because we used it
                    $this->alert('error','product coupon is used more than its permition which ' . $coupon->use_times .' time/s ' );
                }
            }

        }else{
            $this->coupon_code = '';
            $this->alert('error', 'No products available in your cart');
        }

    } 

    public function removeCoupon(){
        session()->remove('coupon');// it will remove coupon session so it will remove discount from getNumbers() function in GeneralHelper.php
        $this->coupon_code = '';
        $this->emit('updateCart');
        $this->alert('success','Coupon is removed');
    }

    // to update customer address id when choosen customer_address_id in view usig livewire hook and save it in session for hold value when update page and call value in  mount constructor livewire or with the same function using session get
    public function updatingPaymentCategoryId(){

        session()->forget('saved_payment_category_id');
        session()->forget('saved_payment_method_id');
        session()->put('saved_payment_category_id',$this->payment_category_id);

        $this->payment_category_id    = session()->has('saved_payment_category_id') ? session()->get('saved_payment_category_id') :'';
        $this->payment_method_id    = session()->has('saved_payment_method_id') ? session()->get('saved_payment_method_id') :'';
        $this->emit('updateCart');

        
    }

    public function updatedPaymentCategoryId(){

        session()->forget('saved_payment_category_id');
        session()->forget('saved_payment_method_id');
        session()->put('saved_payment_category_id',$this->payment_category_id);

        $this->payment_category_id    = session()->has('saved_payment_category_id') ? session()->get('saved_payment_category_id') :'';
        $this->payment_method_id    = session()->has('saved_payment_method_id') ? session()->get('saved_payment_method_id') :'';
        $this->emit('updateCart');

    }


    public function updatingPaymentMethodId(){

        session()->forget('saved_payment_method_id');
        session()->put('saved_payment_method_id', $this->payment_method_id);

        $this->payment_category_id = session()->has('saved_payment_category_id') ? session()->get('saved_payment_category_id') : '';
        $this->payment_method_id = session()->has('saved_payment_method_id') ? session()->get('saved_payment_method_id') : '';

        $this->emit('updateCart');

    }

    public function updatedPaymentMethodId(){

        session()->forget('saved_payment_method_id');
        session()->put('saved_payment_method_id', $this->payment_method_id);

        $this->payment_category_id = session()->has('saved_payment_category_id') ? session()->get('saved_payment_category_id') : '';
        $this->payment_method_id = session()->has('saved_payment_method_id') ? session()->get('saved_payment_method_id') : '';

        $this->emit('updateCart');

    }


    public function updatePaymentMethodOffline(){
        
        // get shippping_companies where there location is the same as customer address location using customer_address_id as forigen key  in UserAddress model and country field on both table 
        $payment_category = PaymentCategory::whereId($this->payment_category_id)->first();

       

        $this->payment_methods = PaymentMethodOffline::with('paymentCategory')->where('payment_category_id' , $this->payment_category_id)->get();

       
    }

   








    public function render()
    {
        return view('livewire.frontend.checkout-component');
    }
}
