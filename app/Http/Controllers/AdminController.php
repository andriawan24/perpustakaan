<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggota;
use App\Buku;
use App\KunjunganMurid;
use App\Peminjam;
use App\PeminjamAnggota;

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
        $peminjaman_kelas = Peminjam::all();
        $kunjungan = KunjunganMurid::all();

        return view("admin.index", compact("anggota", "buku", "peminjaman", "kunjungan", "peminjaman_kelas"));
    }

    public function anggota_index()
    {
        $anggota = Anggota::all();
        return view("anggota.index", compact("anggota"));
    }

    public function anggota_tambah()
    {
        return "Halaman Tambah Anggota";
    }

    public function anggota_proses_tambah(Request $request)
    {
        $this->validate($request, [
            "nama" => "required|string|max:255",
            "id_kelas" => "required|number",
            "alamat" => "required|string",
            "no_tlp" => "required|string",
            "tlp_ortu" => "required|string",
            "jk" => "required|number|max:1",
            "email" => "required|string|email|unique:anggota",
            "password" => "required|string|min:8|confirmed"
        ]);

        $nama = $request->input("nama");
        $id_kelas = $request->input("id_kelas");
        $alamat = $request->input("alamat");
        $no_tlp = $request->input("no_tlp");
        $tlp_ortu = $request->input("tlp_ortu");
        $email = $request->input("email");
        $password = $request->input("password");

        return "Berhasil Menambah Anggota";
    }

    public function anggota_edit($id)
    {
        return "Mengedit id " . $id;
    }
    
    public function anggota_proses_edit($id, Request $request)
    {
        $this->validate($request, [
            "nama" => "required|string|max:255",
            "id_kelas" => "required|number",
            "alamat" => "required|string",
            "no_tlp" => "required|string",
            "tlp_ortu" => "required|string",
            "email" => "required|string|email|unique:anggota",
            "password" => "required|string|min:8|confirmed"
        ]);
    }
}
