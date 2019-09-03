<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    protected $table = 'wali_kelas';
    protected $fillable = ['nip', 'nama', 'alamat', 'no_tlp', 'email'];
}
