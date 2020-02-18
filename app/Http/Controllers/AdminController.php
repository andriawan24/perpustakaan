<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggota;
use App\Buku;
use App\KunjunganMurid;
use App\PeminjamMurid;
use App\PeminjamAnggota;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $peminjaman = PeminjamAnggota::all();
        $peminjaman_kelas = PeminjamMurid::all();
        $kunjungan = KunjunganMurid::all();

        return view("admin.index", compact("anggota", "buku", "peminjaman", "kunjungan", "peminjaman_kelas"));
    }
}
