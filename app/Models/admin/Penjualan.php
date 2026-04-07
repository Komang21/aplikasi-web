<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'barang_id',
        'jumlah',
        'total_harga'
    ];

    public function barang()
    {
        
       
    return $this->belongsTo(\App\Models\Admin\Barang::class, 'barang_id');
    }
}
