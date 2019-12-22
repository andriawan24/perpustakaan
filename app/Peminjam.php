<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = "peminjam_kelas";

    public function kelas()
    {
        return $this->hasOne("App\Kelas", "id");
    }

    public function buku()
    {
        return $this->hasOne("App\Buku", "id");
    }
}
