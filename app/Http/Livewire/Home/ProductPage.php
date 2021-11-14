<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class ProductPage extends Component
{
    public function render()
    {
        return view('livewire.home.product-page')->extends('layouts.app');
    }
}
