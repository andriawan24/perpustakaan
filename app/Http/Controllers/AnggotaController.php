<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Anggota;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnggotaExport;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])) {
            echo $_GET['search'];
            die();
        }
        $anggota = Anggota::paginate(10);
        return view("anggota.index", compact("anggota"));
    }

    public function search(Request $request)
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
                                "<a href='". route("anggota.edit", $key->id) ."' class='item' data-toggle='tooltip' data-placement='top' title='Edit'>" . 
                                    "<i class='zmdi zmdi-edit'></i>" . 
                                "</a>" . 
                                "<form id='hapus_".$key->id."' class=\"mr-1\" action='" . route('anggota.destroy', $key->id) . "' method='post'>" . 
                                    csrf_field() . 
                                    method_field("delete") . 
                                    "<button class=\"item\" type=\"button\" data-toggle=\"tooltip\" data-placement=\"top\" onclick='hapus(" . $key->id . ")' title=\"Delete\">" . 
                                        "<i class='zmdi zmdi-delete'></i>" . 
                                    "</button>" . 
                                "</form>" .
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("anggota.tambah");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view("anggota.edit", compact("anggota"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::find($id);

        $anggota->delete();

        return redirect("/anggota")->with("success", "Berhasil menghapus anggota");
    }

    public function detail(Anggota $anggota)
    {
        return view('anggota.detail', compact("anggota"));
    }
    
    public function export_excel()
    {
        return Excel::download(new AnggotaExport, date("Ymd-His") . "-Anggota.xlsx");
    }
}
