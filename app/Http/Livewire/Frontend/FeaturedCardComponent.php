<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FeaturedCardComponent extends Component
{
    use LivewireAlert;
    
    public function render()
    {
        return view('livewire.frontend.featured-card-component', [
            'featured_cards'    =>  Product::with('firstMedia' , 'lastMedia' ,'photos' )
                                            ->CardCategory()
                                            ->orderBy('published_on','desc') 
                                            ->Featured()
                                            ->Active()
                                            ->HasQuantity()
                                            ->ActiveCategory()
                                            ->take(8)
                                            ->get()
        ]);
    }
}
