<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KunjunganAnggota extends Model
{
    protected $table = 'kunjungan';
    protected $fillable = ['nama', 'id_kelas', 'alamat', 'no_tlp', 'jk', 'email', 'is_anggota'];
    public $timestamps = false;
}
