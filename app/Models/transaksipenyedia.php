<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenyedia extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penyedias';

    protected $fillable = [
        'penyedia_id',
        'photo',
    ];

    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class, 'penyedia_id', 'id_penyedia');
    }
}
