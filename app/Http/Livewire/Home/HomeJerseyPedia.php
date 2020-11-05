<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class HomeJerseyPedia extends Component
{
    public function render()
    {
        return view('livewire.home.home-jersey-pedia')
            ->extends('layouts.app');
    }
}
