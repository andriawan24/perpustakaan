<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table = 'kelas';
    protected $fillable = ['nama', 'id_walikelas', 'id_ketuamurid'];
    public $timestamps = FALSE;
}
