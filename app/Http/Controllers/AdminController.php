<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Anggota;
use App\Buku;
use App\KunjunganMurid;
use App\Peminjam;
use App\PeminjamAnggota;
use App\Kelas;
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
        $peminjaman_kelas = Peminjam::all();
        $kunjungan = KunjunganMurid::all();

        return view("admin.index", compact("anggota", "buku", "peminjaman", "kunjungan", "peminjaman_kelas"));
    }

    public function anggota_index()
    {
        if(isset($_GET['search'])) {
            echo $_GET['search'];
            die();
        }
        $anggota = Anggota::all();
        return view("anggota.index", compact("anggota"));
    }

    public function anggota_search(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $anggota = Anggota::where("nama", "like", "%" . $request->search . "%")->get();

            if($anggota) {
                foreach ($anggota as $val => $key) {
                    $output .= 
                    "<tr class='tr-shadow'>".
                        "<td>" . str_replace($request->search, "<span class='text-primary'>$request->search</span>", $key->nama) . "</td>" . 
                        "<td style='width: 90px'>" . $key->kelas->nama . "</td>" . 
                        "<td>" . "<span class='block-email'>" . $key->email . "</span>" . "</td>" . 
                        "<td>" . $key->no_tlp . "</td>" . 
                        "<td>" . $key->jumlah_kunjungan . "</td>" . 
                        "<td>" . 
                            "<div class='table-data-feature'>" .    
                                "<button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>" . 
                                    "<i class='zmdi zmdi-edit'></i>" . 
                                "</button>" . 
                                "<button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>" . 
                                    "<i class='zmdi zmdi-delete'></i>" . 
                                "</button>" . 
                                "<button class='item' data-toggle='tooltip' data-placement='top' title='More'>" . 
                                    "<i class='zmdi zmdi-info'></i>" . 
                                "</button>" . 
                            "</div>" .
                        "</td>". 
                    "</tr>" . 
                    "<tr class='spacer'></tr>";
                }

                return Response($output);
            }else{
                
            }
        }
    }

    public function anggota_tambah()
    {
        return view("anggota.tambah");
    }

    public function anggota_proses_tambah(Request $request)
    {
        $this->validate($request, [
            "nama" => "required|string|max:255",
            "id_kelas" => "required|numeric",
            "alamat" => "required|string",
            "jk" => "required|numeric|max:1",
            "no_tlp" => "required|string|min:10|max:14",
            "tlp_ortu" => "required|string|min:10|max:14",
            "email" => "required|string|email|unique:anggota",
            "password" => "required|string|min:8|confirmed"
        ]);

        $nama = $request->input("nama");
        $id_kelas = $request->input("id_kelas");
        $jk = $request->input("jk");
        $alamat = $request->input("alamat");
        $no_tlp = $request->input("no_tlp");
        $tlp_ortu = $request->input("tlp_ortu");
        $email = $request->input("email");
        $password = $request->input("password");
        
        Anggota::create([
            "nama" => $nama,
            "id_kelas" => $id_kelas,
            "jk" => $jk,
            "alamat" => $alamat,
            "no_tlp" => $no_tlp,
            "tlp_ortu" => $tlp_ortu,
            "email" => $email,
            "password" => Hash::make($password)
        ]);

        return redirect("/anggota")->with("success", "Berhasil Menambah Anggota");
    }

    public function anggota_edit($id)
    {
        $anggota = Anggota::find($id);

        return view("anggota.edit", compact("anggota"));
    }
    
    public function anggota_proses_edit($id, Request $request)
    {
        $this->validate($request, [
            "nama" => "required|string|max:255",
            "id_kelas" => "required|numeric",
            "alamat" => "required|string",
            "jk" => "required|numeric|max:1",
            "no_tlp" => "required|string|min:10|max:14",
            "tlp_ortu" => "required|string|min:10|max:14",
            "email" => "required|string|email",
            "password" => "required|string|min:8|confirmed"
        ]);

        $anggota = Anggota::find($id);

        $nama = $request->input("nama");
        $id_kelas = $request->input("id_kelas");
        $jk = $request->input("jk");
        $alamat = $request->input("alamat");
        $no_tlp = $request->input("no_tlp");
        $tlp_ortu = $request->input("tlp_ortu");
        $email = $request->input("email");
        $password = $request->input("password");

        $anggota->nama = $nama;
        $anggota->id_kelas = $id_kelas;
        $anggota->alamat = $alamat;
        $anggota->jk = $jk;
        $anggota->no_tlp = $no_tlp;
        $anggota->tlp_ortu = $tlp_ortu;
        $anggota->email = $email;
        $anggota->password = Hash::make($password);
        $anggota->save();

        return redirect("/anggota")->with("success", "Berhasil Mengubah Data");
    }

    public function anggota_hapus($id)
    {
        $anggota = Anggota::find($id);

        $anggota->delete();

        return back()->with("success", "Berhasil menghapus anggota");
    }
}
