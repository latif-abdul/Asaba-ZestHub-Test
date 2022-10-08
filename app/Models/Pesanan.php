<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public $table = 'pesanan';
    public $fillable = [
        'cust_id'
    ];
    public function cust()
    {
        return $this->belongsTo(Cust::class, 'cust_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}
