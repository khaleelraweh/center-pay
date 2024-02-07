<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Product as Card;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UpdateQtyComponent extends Component
{
    use LivewireAlert;

    public $card;
    public $quantity = 1;

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {

            $this->quantity--;
        }
    }

    public function increaseQuantity()
    {

        if ($this->card->quantity == -1) {
            $this->quantity++;
        } else {
            if ($this->card->quantity  >  $this->quantity) {
                $this->quantity++;
            } else {
                $this->alert('warning', 'هذه هي الكمية القصوى التي يمكنك إضافتها!');
            }
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
            $this->quantity = 1;
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
        return view('livewire.frontend.card.update-qty-component');
    }
}
