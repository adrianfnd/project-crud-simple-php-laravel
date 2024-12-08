<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'judul_buku', 
        'penulis', 
        'harga', 
        'cover_buku', 
        'tahun_terbit', 
        'penerbit', 
        'deskripsi', 
        'kategori', 
        'stok'
    ];
}
