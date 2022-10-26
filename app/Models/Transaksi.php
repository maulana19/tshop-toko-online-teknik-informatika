<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penjual;
use App\Models\Karya;
use App\Models\User;
use eloquent;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    /**
     * Get the user that owns the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penjual()
    {
        return $this->belongsTo(Penjual::class);
    }

    public function pembeli()
    {
        return $this->belongsTo(User::class);
    }

    public function karya()
    {
        return $this->belongsTo(Karya::class);
    }
}
