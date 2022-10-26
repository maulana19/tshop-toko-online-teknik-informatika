<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
use eloquent;

class Penjual extends Model
{
    use HasFactory;
    protected $table = 'penjual';


    public function penjual()
    {
        return $this->hasMany(Transaksi::class);
    }
}
