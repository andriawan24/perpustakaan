<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    public $table = 'anggota';
    protected $fillable = ['nama', 'id_kelas', 'alamat', 'no_tlp', 'tlp_orangtua', 'email', 'jumlah_kunjungan'];
}
