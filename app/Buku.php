<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    public $table = 'buku';
    protected $fillable = ['judul', 'penulis', 'penerbit', 'jumlah', 'tanggal_regis', 'cover']; 
    public $timestamps = false;
}
