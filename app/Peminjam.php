<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = "peminjam_kelas";
    protected $fillable = ["id_kelas", "id_buku", "ruang", "jam_pelajaran", "jumlah"];
    public $timestamps = false;

    public function kelas()
    {
        return $this->hasOne("App\Kelas", "id", "id_kelas");
    }

    public function buku()
    {
        return $this->hasOne("App\Buku", "id", "id_buku");
    }
}
