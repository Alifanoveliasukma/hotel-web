<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars';
    protected $fillable = ['id', 'nama_kamar', 'tipe_kamar', 'foto_kamar', 'fasilitas_kamar', 'stok_kamar', 'harga_kamar', 'deskripsi_kamar'];
    
    public function pesanan_detail()
    {
        return $this->hasMany(PesananDetail::class, 'kamar_id', 'id');
    }
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'user_id', 'id');
    }
}
