<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    //use WthPagination;
    // protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];

    public function updateingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(6);
        } else {
            $products = Product::paginate(6);
        }
        $title = '';
        return view('livewire.product-index', compact('products'))
            ->extends('layouts.app');
    }
}
