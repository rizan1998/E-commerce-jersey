<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    //fillable
    protected $fillable = [
        'jumlah_pesanan',
        'total_harga',
        'nameset',
        'nama',
        'nomor',
        'product_id',
        'pesanan_id'
    ];

    public function Pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
