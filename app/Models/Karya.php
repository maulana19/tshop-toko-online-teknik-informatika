<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use eloquent;
use App\Models\Transaksi;

class Karya extends Model
{
    use HasFactory;
    protected $table = 'karya';

    public function karya()
    {
        return $this->hasMany(Transaksi::class);
    }
}
