<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KunjunganMurid extends Model
{
    protected $table = 'kunjungan_murid';
    protected $fillable = ['nama', 'id_kelas', 'alamat', 'no_tlp'];
    public $timestamps = false;
}
