<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product, $jumlah_pesanan, $nama, $nomor;


    public function mount($id)
    {
        $productDetail = Product::find($id);
        if ($productDetail) {
            $this->product = $productDetail;
        } else {
            dd($productDetail);
        }
    }

    public function render()
    {
        return view('livewire.product-detail')
            ->extends('layouts.app');
    }
}
