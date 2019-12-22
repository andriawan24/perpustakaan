<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['nama', 'id_kelas', 'alamat', 'no_tlp', 'tlp_orangtua', 'email', 'jumlah_kunjungan'];

    public function kelas()
    {
        return $this->hasOne("App\Kelas", "id", "id_kelas");
    }
}
