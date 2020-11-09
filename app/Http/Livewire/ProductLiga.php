<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductLiga extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $liga;
    public $foo;
    public $search = '';
    public $page = 1;
    // protected $queryString = ['search'];

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }


    public function mount($id)
    {
        $ligaDetail = Liga::find($id);
        if ($ligaDetail) {
            $this->liga = $ligaDetail;
        } else {
            dd($ligaDetail);
        }

        $this->fill(request()->only('search', 'page'));
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
