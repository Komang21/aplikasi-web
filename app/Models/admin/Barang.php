<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //use Illuminate\Database\Eloquent\Model;
    protected $fillable = [
        'nama_barang',
        'stok',
        'harga'
    ];
}

