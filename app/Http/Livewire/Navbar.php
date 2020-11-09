<?php

namespace App\Http\Livewire;

use App\Liga;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    // interaksi component
    protected $listeners = [
        'masukkeranjang' => 'updateKeranjang'
    ];
    public $jumlah = 0;

    public function updateKeranjang()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                // menghitung jumlah pesanan
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }
        }
    }

    public function mount()
    {
        if (Auth::user()) {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($pesanan) {
                // menghitung jumlah pesanan
                $this->jumlah = PesananDetail::where('pesanan_id', $pesanan->id)->count();
            }
        }
    }

    public function render()
    {
        return view(
            'livewire.navbar',
            [
                'ligas' => Liga::all(),
                'jumlah_pesanan' => $this->jumlah
            ]
        );
    }
}
