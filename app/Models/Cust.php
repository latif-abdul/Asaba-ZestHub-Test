<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cust extends Model
{
    use HasFactory;
    public $table = 'cust';
    protected $fillable = [
		"nama_cust",
    ];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
