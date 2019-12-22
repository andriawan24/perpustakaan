<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return "Halaman Dashboard";
    }

    public function anggota_index()
    {
        return "Halaman Anggota";
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
    
    public function anggota_proses_edit($id)
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
