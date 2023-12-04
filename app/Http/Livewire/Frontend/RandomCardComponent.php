<?php

namespace App\Http\Livewire\Frontend;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RandomCardComponent extends Component
{
    use LivewireAlert;

    public $random_cards;

    public function render()
    {
        return view('livewire.frontend.random-card-component');
    }
}
