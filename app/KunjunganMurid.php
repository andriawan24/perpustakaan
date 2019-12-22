<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KunjunganMurid extends Model
{
    protected $table = 'kunjungan';
    protected $fillable = ['nama', 'id_kelas', 'alamat', 'no_tlp', 'jk', 'email'];
    public $timestamps = false;
}
