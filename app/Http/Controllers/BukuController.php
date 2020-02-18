<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::paginate(5);

        return view('buku.index', compact("buku"));
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $buku = Buku::where("judul", "like", "%" . $request->search . "%")->get();

            if($buku) {
                foreach ($buku as $val => $key) {
                    $output .= 
                    "<tr class='tr-shadow'>".
                        "<td>" . "<img src='img/book_cover/$key->cover' alt='Cover Buku' height='150' width='100' style='margin:20px'>" . "</td>" . 
                        "<td>" . str_replace($request->search, "<span class='text-primary'>$request->search</span>", $key->judul) . "</td>" . 
                        "<td>" . $key->penulis . "</td>" . 
                        "<td>" . $key->penerbit . "</td>" . 
                        "<td>" . date("d/m/Y", strtotime($key->tanggal_regis)) . "</td>" . 
                        "<td>" . $key->jumlah . "</td>" . 
                        "<td>" . 
                            "<div class='table-data-feature'>" .    
                                "<a class='item' href='$key->id' data-toggle='tooltip' data-placement='top' title='Edit'>
                                    <i class='zmdi zmdi-edit'></i>
                                </a>" . 
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("buku.tambah");
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
            "cover" => "image|mimes:jpeg,png,jfif,jpg",
            "judul" => "required|string",
            "penulis" => "required|string",
            "penerbit" => "required|string",
            "jumlah" => "required|numeric"
        ]);
            
        $cover = $request->file("cover");
        $judul = $request->input("judul");
        $penulis = $request->input("penulis");
        $penerbit = $request->input("penerbit");
        $jumlah = $request->input("jumlah");
        $nama_file = null;

        if($cover) {
            $nama_file = time() . "_" . $cover->getClientOriginalName();
    
            $destination = 'img/book_cover';
            $cover->move(public_path($destination), $nama_file);
        }

        Buku::create([
            "judul" => $judul,
            "penulis" => $penulis,
            "penerbit" => $penerbit,
            "jumlah" => $jumlah,
            "cover" => $nama_file,
        ]);

        return redirect('/buku')->with('success', 'Berhasil menambah buku');
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
        $buku = Buku::find($id);

        return view("buku.edit", compact("buku"));
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
            "judul" => "required|string|max:255",
            "penulis" => "required|string|max:255",
            "penerbit" => "required|string",
            "jumlah" => "required|numeric",
            "cover" => "image|mimes:jpeg,png,jfif,jpg",
        ]);

        $buku = Buku::find($id);

        $judul = $request->input("judul");
        $penulis = $request->input("penulis");
        $penerbit = $request->input("penerbit");
        $jumlah = $request->input("jumlah");
        $cover = $request->file("cover");
        $nama_file = $buku->cover;

        // $page = $request->input("page");
        $page = $request->input("page");
        
        if($cover) {
            // Menghapus gambar lama
            if ($buku->cover != 'default.jpg') {
                $image_path = public_path('img/book_cover/' . $buku->cover);
                if (\File::exists($image_path)) {
                    \File::delete($image_path);
                }
            }

            $nama_file = time() . "_" . $cover->getClientOriginalName();
    
            $destination = 'img/book_cover';
            $cover->move(public_path($destination), $nama_file);
        }

        $buku->judul = $judul;
        $buku->penulis = $penulis;
        $buku->penerbit = $penerbit;
        $buku->jumlah = $jumlah;
        $buku->cover = $nama_file;
        $buku->save();

        return redirect("/buku")->with("success", "Berhasil Mengubah Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        $buku->delete();

        return redirect()->back()->with("success", "Berhasil Menghapus Buku");
    }
}
