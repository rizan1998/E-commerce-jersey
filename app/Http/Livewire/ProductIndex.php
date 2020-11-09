<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];

    // untuk reset page
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('nama', 'like', '%' . $this->search . '%')->paginate(6);
        } elseif ($this->search == null) {
            $products = Product::paginate(6);
        }
        $title = '';
        return view('livewire.product-index', compact('products', 'title'))
            ->extends('layouts.app');
    }
}
