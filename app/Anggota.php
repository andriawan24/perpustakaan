<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['nama', 'id_kelas', 'alamat', "jk", 'no_tlp', 'tlp_ortu', 'email', "password", 'jumlah_kunjungan'];

    public function kelas()
    {
        return $this->hasOne("App\Kelas", "id", "id_kelas");
    }
}
