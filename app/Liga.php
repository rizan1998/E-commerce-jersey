<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    //
    public function Product()
    {
        return $this->hasMany(Product::class, 'liga_id', 'id');
    }
}
