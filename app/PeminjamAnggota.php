<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamAnggota extends Model
{
    protected $table = "peminjam_anggota";

    protected $fillable = ["id_anggota", "id_buku", "tanggal_kembali", "jumlah"];

    public function anggota()
    {
        return $this->hasOne("App\Anggota", "id", "id_anggota");
    }
    
    public function buku()
    {
        return $this->hasOne("App\Buku", "id");
    }

    public $timestamps = false;
}
