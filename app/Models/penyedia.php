<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    use HasFactory;

    protected $table = 'penyedias';
    protected $primaryKey = 'id_penyedia';
    public $incrementing = true;
    protected $fillable = ['nama', 'harga', 'deskripsi', 'photo'];
    public $timestamps = false;

    public function transaksis()
    {
        return $this->hasMany(TransaksiPenyedia::class, 'penyedia_id', 'id_penyedia');
    }
}
