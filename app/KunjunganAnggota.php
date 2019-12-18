<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KunjunganAnggota extends Model
{
    protected $table = 'kunjungan_anggota';
    protected $fillable = ['id_anggota'];
    public $timestamps = false;
}
