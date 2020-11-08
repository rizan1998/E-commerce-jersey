<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Product;
use Livewire\Component;

class ProductLiga extends Component
{

    public $search, $liga;
    protected $queryString = ['search'];

    public function updateingSearch()
    {
        $this->resetPage();
    }

    public function mount($id)
    {
        $ligaDetail = Liga::find($id);
        if ($ligaDetail) {
            $this->liga = $ligaDetail;
        } else {
            dd($ligaDetail);
        }
    }

    public function render()
    {

        if ($this->search) {
            $products = Product::where('liga_id', $this->liga->id)->where('nama', 'like', '%' . $this->search . '%')->paginate(6);
        } else {
            $products = Product::where('liga_id', $this->liga->id)->paginate(6);
        }
        $title =  $this->liga->nama;
        return view('livewire.product-index', compact('products', 'title'))
            ->extends('layouts.app');
    }
}
