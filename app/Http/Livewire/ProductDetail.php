<?php

namespace App\Http\Livewire;

use App\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $jumlah_pesanan;
    public $nama;
    public $nomor;


    public function mount($id)
    {
        $productDetail = Product::find($id);
        if ($productDetail) {
            $this->product = $productDetail;
        } else {
            dd($productDetail);
        }
    }

    // untuk menampung inputan
    public function masukkanKeranjang()
    {
        // dd('berhasil');
        $this->validate([
            'jumlah_pesanan' => 'required'
        ]);
        //validasi jika belum login
        if (!Auth::user()) {
            return redirect()->route('login');
        }
    }


    public function render()
    {
        return view('livewire.product-detail')
            ->extends('layouts.app');
    }
}
