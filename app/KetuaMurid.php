<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetuaMurid extends Model
{
    public $table = 'ketua_murid';
    protected $fillable = ['nis', 'nama', 'alamat', 'no_tlp', 'tlp_ortu', 'email'];
}
