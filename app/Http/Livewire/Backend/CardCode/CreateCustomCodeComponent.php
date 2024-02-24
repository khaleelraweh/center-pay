<?php

namespace App\Http\Livewire\Backend\CardCode;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Component;

class CreateCustomCodeComponent extends Component
{
    public $card_categories;
    public $cards;

    public $selectedCardCategory = null;
    public $selectedCard = null;

    public function mount()
    {
        $this->card_categories  = ProductCategory::whereStatus(1)->whereSection(2)->get(['id', 'category_name']);
        $this->cards = collect();
    }

    public function render()
    {
        return view('livewire.backend.card-code.create-custom-code-component');
    }

    public function updatedSelectedCardCategory($cardCategory)
    {
        $this->cards = Product::whereStatus(1)->where('product_category_id', $cardCategory)->cardCategory()->get(['id', 'product_name']);
    }
}
