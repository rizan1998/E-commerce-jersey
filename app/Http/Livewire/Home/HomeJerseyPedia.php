<?php

namespace App\Http\Livewire\Home;

use App\Liga;
use App\Product;
use Livewire\Component;

class HomeJerseyPedia extends Component
{
    public function render()
    {
        return view(
            'livewire.home.home-jersey-pedia',
            [
                'products' => Product::take(4)->get(),
                'ligas' => Liga::all()
            ]
        )
            ->extends('layouts.app');
    }
}
