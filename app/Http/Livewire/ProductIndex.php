<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    //use WthPagination;
    // protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $products = Product::paginate(6);
        return view('livewire.product-index', compact('products'))
            ->extends('layouts.app');
    }
}
