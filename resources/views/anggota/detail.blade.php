@extends('layouts.master')

@section('title', "Detail Anggota | Perpustakaan SMK Negeri 2 bandung")

@section('content')
    <section>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-1 m-b-35 mt-4">Detail Anggota</h3>
                        
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ URL::previous() }}" class="btn btn-sm btn-warning float-right text-light"><i class="fa fa-undo"> Back</i></a>
                            </div>
                            <div class="card-body card-block">
                                <table class="table table-striped">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $anggota->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td>{{ $anggota->kelas->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $anggota->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon</td>
                                        <td>:</td>
                                        <td>{{ $anggota->no_tlp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><span class="block-email">{{ $anggota->email }}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Kunjungan</td>
                                        <td>:</td>
                                        <td>{{ ($anggota->jumlah_kunjungan == 0) ? "Belum Pernah" : $anggota->jumlah_kunjungan . " Kali" }}</td>
                                    </tr>
                                </table>
                                <div class="mt-3 mb-3 float-right">
                                    <div class="row">
                                        <a href="{{ route("anggota.edit", $anggota->id) }}" class="btn btn-warning text-light mr-3">
                                            <i class="fa fa-cut"></i>
                                        </a>
                                        <form class="mr-1" id="hapus" action="{{ route('anggota.destroy', $anggota->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="top" onclick="hapus()" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function hapus() {
        Swal.fire({
        title: 'Apa kamu yakin akan menghapusnya??',
        text: "jangan-jangan kepencet..",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Sudah'
        }).then((result) => {
            if (result.value) {
            Swal.fire({
                title: 'Anggota sudah dihapus dari perpustakaan!',
                text: 'Dihapus pada <?= date("d F Y") ?>',
                type: 'success',
                showConfirmButton: false			     
            });
            setTimeout(function(){
                $("form#hapus").submit();
                }, 800
            );
            }else{
            return false;
            }
        })
    }
    </script>
@endsection