<?php

namespace App\Http\Livewire\Frontend\Card;

use App\Models\Product as Card;
use Gloudemans\Shoppingcart\Facades\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RelatedCardsComponent extends Component
{
    use LivewireAlert;

    public $related_cards;



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
        return view('livewire.frontend.card.related-cards-component');
    }
}
