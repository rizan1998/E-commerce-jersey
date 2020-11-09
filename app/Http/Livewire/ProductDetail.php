<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\PesananDetail;
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

        // hitung total harga
        if (!empty($this->nama)) {
            $total_harga = $this->jumlah_pesanan * $this->product->harga + $this->product->harga_nameset;
        } else {
            $total_harga = $this->jumlah_pesanan * $this->product->harga;
        }

        // ngecek Apakah user punya data pesanan utama yang statusnya 0
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if (empty($pesanan)) {
            Pesanan::create([
                'user_id' => Auth::user()->id,
                'total_harga' => $total_harga,
                'status' => 0,
                'kode_unik' => mt_rand(100, 999) //kode untuk bilangan random
            ]);

            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->kode_pemesanan = 'JP' . $pesanan->id;
            $pesanan->update();
        } else {
            $pesanan->total_harga = $pesanan->total_harga + $total_harga;
            $pesanan->update();
        }

        // menyimpan pesanan detail
        PesananDetail::create([
            'product_id' => $this->product->id,
            'pesanan_id' =>  $pesanan->id,
            'jumlah_pesanan' => $this->jumlah_pesanan,
            'nameset' => $this->nama ? true : false,
            'nama' => $this->nama,
            'nomor' => $this->nomor,
            'total_harga' => $total_harga
        ]);

        // interaksi antara 2 component
        $this->emit('masukkeranjang');
        session()->flash('message', 'Sukses Masuk Keranjang');
    }




    public function render()
    {
        return view('livewire.product-detail')
            ->extends('layouts.app');
    }
}
