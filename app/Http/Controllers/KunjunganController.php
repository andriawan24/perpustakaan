<?php

namespace App\Http\Controllers;

use App\Anggota;
use Illuminate\Http\Request;
use App\Kelas;
use App\KunjunganAnggota;
use App\KunjunganMurid;
use Illuminate\Support\Facades\Hash;

class KunjunganController extends Controller
{
    public function index()
    {
        return view('kunjungan.index');
    }

    public function getKelas(Request $request)
    {
        $search = $request->search;

        if ( $search == "" ) {
            $kelas = Kelas::orderby("nama", "asc")->select("id", "nama")->limit(5)->get();
        }else{
            $kelas = Kelas::orderby("nama", "asc")->select("id", "nama")->where("nama", "like", "%".$search."%")->limit(5)->get();
        }

        $response = array();
        foreach($kelas as $val){
            $response[] = array(
                "id" => $val->id,
                "text" => $val->nama
            );
        }

        echo json_encode($response);
        exit;
    }

    public function murid(Request $request)
    {
        $nama = $request->input("name");
        $kelas = $request->input("class");
        $alamat = $request->input("address");
        $jk = $request->input("jk");
        $email = $request->input("email");
        $no_tlp = $request->input("phone_number");

        KunjunganMurid::create([
            "nama" => $nama,
            "id_kelas" => $kelas,
            "no_tlp" => $no_tlp,
            "alamat" => $alamat,
            "jk" => $jk,
            "email" => $email,
        ]);

        return redirect('/kunjungan')->with("success", "Berhasil Mengisi Kehadiran");
    }

    public function anggota(Request $request)
    {
        $email = $request->input("email");
        $pass = $request->input("password");

        if(Anggota::where("email", "=", $email)->exists()) {
            $user = Anggota::where("email", "=", $email)->first();
            
            if(Hash::check($pass, $user->password)) {
                KunjunganAnggota::create([
                    "nama" => $user->nama,
                    "id_kelas" => $user->id_kelas,
                    "no_tlp" => $user->no_tlp,
                    "alamat" => $user->alamat,
                    "jk" => $user->jk,
                    "email" => $user->email,
                    "is_anggota" => 1,
                ]);

                $user->jumlah_kunjungan += 1;
                $user->save();
                
                return redirect('/kunjungan')->with("success", "Berhasil mengisi pendaftaran");
            }else{
                return redirect("/kunjungan")->with("warning", "Password Salah, periksa kembali");
            }
        }else{
            return redirect("/kunjungan")->with("warning", "Email tidak ditemukan");
        }
    }
}
