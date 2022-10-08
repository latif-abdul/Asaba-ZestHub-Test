<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;
    public $table = 'detail_pesanan';
    public $fillable = [
        'cust_id',
        'menu_id',
        'jumlah',
        'pesanan_id'
    ];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function cust()
    {
        return $this->belongsTo(Cust::class, 'cust_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
