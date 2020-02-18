<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buku;
use App\Anggota;
use App\PeminjamAnggota;
use App\PeminjamMurid;

class PeminjamanController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function create()
    {
        $list_buku = Buku::all();
        $list_anggota = Anggota::all();
        return view("admin.pinjam", compact("list_buku", 'list_anggota'));
    }
    
    public function peminjaman_anggota(Request $request)
    {
        $this->validate($request, [
            "id_anggota" => "required|numeric|not_in:0",
            "id_buku" => "required|numeric|not_in:0",
            "tgl_kembali" => "required",
            "jumlah" => "required|numeric",
        ]);
        $buku = Buku::where("id", $request->input("id_buku"))->first();
        $this->validate($request, [
            "jumlah" => "required|numeric|max:$buku->jumlah"
        ]);

        $id_anggota = $request->input("id_anggota");
        $id_buku = $request->input("id_buku");
        $tgl_kembali = $request->input("tgl_kembali");
        $jumlah = $request->input("jumlah");

        PeminjamAnggota::create([
            "id_anggota" => $id_anggota,
            "id_buku" => $id_buku,
            "tanggal_kembali" => $tgl_kembali, 
            "jumlah" => $jumlah, 
        ]);

        $buku->jumlah -= $jumlah;
        $buku->save();

        return redirect('/dashboard')->with("success", "Berhasil melakukan peminjaman");
    }

    public function peminjaman_murid(Request $request)
    {
        $this->validate($request, [
            "id_kelas" => "required|numeric|not_in:0",
            "id_buku" => "required|numeric|not_in:0",
            "ruang" => "required|numeric|not_in:0",
            "jam_pelajaran" => "required",
            "guru_mapel" => "required|string",
        ]);
        $buku = Buku::where("id", $request->input("id_buku"))->first();
        $this->validate($request, [
            "jumlah" => "required|numeric|max:$buku->jumlah"
        ]);

        $id_kelas = $request->input("id_kelas");
        $id_buku = $request->input("id_buku");
        $ruang = $request->input("ruang");
        $jumlah = $request->input("jumlah");
        $jam_pelajaran = $request->input("jam_pelajaran");
        $guru_mapel = $request->input("guru_mapel");

        PeminjamMurid::create([
            "id_kelas" => $id_kelas,
            "id_buku" => $id_buku,
            "ruang" => $ruang, 
            "jumlah" => $jumlah, 
            "jam_pelajaran" => $jam_pelajaran, 
            "guru_mapel" => $guru_mapel 
        ]);

        $buku->jumlah -= $jumlah;
        $buku->save();

        return redirect('/dashboard')->with("success", "Berhasil melakukan peminjaman");
    }
}
