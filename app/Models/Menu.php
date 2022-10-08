<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $table = 'menu';
    protected $fillable = [
		"nama_menu",
        "harga",
    ];

    public function cust()
    {
        return $this->hasMany(Cust::class);
    }
}
