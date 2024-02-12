<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Product as Card;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class MoreCardsComponent extends Component
{
    use LivewireAlert;

    public $more_cards;

    public function addToCart($id)
    {

        $card = card::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($card) {
            return $cartItem->id === $card->id;
        });

        if ($duplicates->isNotEmpty()) {
            $this->alert('error', 'الباقة  مضافة مسبقا!!');
        } else {
            Cart::instance('default')->add($card->id, $card->name, 1, $card->price)->associate(Card::class);
            $this->emit('updateCart');
            $this->alert('success', 'تم إضافة الباقة الي السلة بنجاح!');
            return redirect()->back();
        }
    }

    public function addToWishList($id)
    {

        $card = Card::whereId($id)->Active()->HasQuantity()->ActiveCategory()->firstOrFail();

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($card) {
            return $cartItem->id === $card->id;
        });

        if ($duplicates->isNotEmpty()) {
            $this->alert('error', 'الباقة مضافة مسبقا');
        } else {
            Cart::instance('wishlist')->add($card->id, $card->name, 1, $card->price)->associate(Card::class);
            $this->emit('updateCart');
            $this->alert('success', 'تم اضافة الباقة الي قائمة مفضلاتك بنجاح');
        }
    }

    public function store($instance, $card_id, $card_name, $card_quentity, $card_price)
    {

        $duplicates = Cart::instance($instance)->search(function ($cartItem, $rowId) use ($card_id) {
            return $cartItem->id === $card_id;
        });

        if ($duplicates->isNotEmpty()) {
            if ($instance == 'default') {
                $this->alert('error', __('panel.f_m_item_already_exist_in_shop_cart'));
            } else if ($instance == 'wishlist') {
                $this->alert('error', __('panel.f_m_item_already_exist_in_wishlist_cart'));
            } else {
                $this->alert('error', __('panel.f_m_some_thing_went_error'));
            }
        } else {
            Cart::instance($instance)->add($card_id, $card_name, $card_quentity, $card_price)->associate(Card::class);
            $this->emit('updateCart');
            if ($instance == 'default') {
                $this->alert('success', __('panel.f_m_item_add_to_shop_cart'));
            } else if ($instance == 'wishlist') {
                $this->alert('success', __('panel.f_m_item_add_to_wishlist_cart'));
            } else {
                $this->alert('success', __('panel.f_m_some_thing_went_error'));
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.more-cards-component');
    }
}
