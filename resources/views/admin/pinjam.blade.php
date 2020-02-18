@extends('layouts.master')

@section('title', "Tambah Peminjaman | Perpustakaan SMK Negeri 2 bandung")

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-35 mt-4">Tambah Peminjaman</h3>
                    <div class="card">
                        <div class="card-header">
                            <div class="switch-field" id="pilih-peminjaman">
                                <input type="radio" id="radio-one" name="jenis-pilihan" value="murid" checked/>
                                <label for="radio-one">Murid</label>
                                <input type="radio" id="radio-two" name="jenis-pilihan" value="anggota" />
                                <label for="radio-two">Anggota</label>
                            </div>
                        </div>
                        <div id="form-murid">
                            <div class="card-body card-block">
                                <form action="{{ route("peminjaman.pinjam.murid") }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="id_kelas" class="col-form-label col-md-3">Kelas</label>
                                    <div class="col-md-9">
                                        <select name="id_kelas" autocomplete="off" id="class" style="width: 100%" required>
                                            <option value="0">Pilih Kelas :</option>
                                        </select>
                                        @error("id_kelas")
                                            <span class="help-block">
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_buku" class="col-form-label col-md-3">Buku</label>
                                    <div class="col-md-9">
                                        <input onmouseover="this.style.cursor='pointer'" type="text" name="judul_buku" id="judul_buku" class="form-control @error('id_buku') is-invalid @enderror" readonly data-toggle="modal" data-target="#listBuku" placeholder="Pilih Buku" value="{{ old("judul_buku") }}">
                                        <input type="hidden" name="id_buku" id="id_buku" value="{{ old("id_buku") }}">
                                        @error("id_buku")
                                            <span class="help-block">
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-form-label col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Buku" class="form-control @error('jumlah') is-invalid @enderror">
                                        @error("jumlah")
                                            <span class="help-block">
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ruang" class="col-form-label col-md-3">Ruang Kelas</label>
                                    <div class="col-md-9">
                                        <input type="number" name="ruang" id="ruang" class="form-control @error('ruang') is-invalid @enderror" placeholder="Masukkan No. Ruangan Kelas mu" value="{{ old("ruang") }}">
                                        @error("ruang")
                                            <span class="help-block">
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="guru_mapel" class="col-form-label col-md-3">Pengajar</label>
                                    <div class="col-md-9">
                                        <input type="text" name="guru_mapel" id="guru_mapel" class="form-control @error('guru_mapel') is-invalid @enderror" placeholder="Masukkan Nama Pengajar" value="{{ old("guru_mapel") }}">
                                        @error("guru_mapel")
                                            <span class="help-block">
                                                <span class="text-danger">{{ $message }}</span>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jam_pelajaran" class="col-form-label col-md-3">Jam Pelajaran</label>
                                    <div class="col-md-9">
                                        <input type="text" name="jam_pelajaran" id="jam_pelajaran" class="form-control @error('jam_pelajaran') is-invalid @enderror" placeholder="Masukkan Jam Pelajaran" value="{{ old("jam_pelajaran") }}">
                                        @if ($errors->has("jam_pelajaran"))
                                            <span class="help-block">
                                                <span class="text-danger">{{ $errors->first("jam_pelajaran") }}</span>
                                            </span>
                                        @else
                                            <span class="help-block">
                                                Contoh. 3-5, 5-7, dst.
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                            </form>
                        </div>

                        <div id="form-anggota" style="display:none">
                            <div class="card-body card-block">
                                <form action="{{ route('peminjaman.pinjam.anggota') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="nama_anggota" class="col-form-label col-md-3">Peminjam</label>
                                    <div class="col-md-9">
                                        <input onmouseover="this.style.cursor='pointer'" type="text" name="nama_anggota" id="nama_anggota" class="form-control @error('nama_anggota') is-invalid @enderror" readonly data-toggle="modal" data-target="#listAnggota" placeholder="Pilih Anggota">
                                        <input type="hidden" name="id_anggota" id="id_anggota">
                                        @error("nama_anggota")
                                            <span class="invalid-feecback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="judul_buku" class="col-form-label col-md-3">Buku</label>
                                    <div class="col-md-9">
                                        <input onmouseover="this.style.cursor='pointer'" type="text" name="judul_buku" id="judul_buku_2" class="form-control @error('judul_buku') is-invalid @enderror" readonly data-toggle="modal" data-target="#listBuku2" placeholder="Pilih Buku">
                                        <input type="hidden" name="id_buku" id="id_buku_2">
                                        @error("judul_buku")
                                            <span class="invalid-feecback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_kembali" class="col-form-label col-md-3">Tanggal Kembali</label>
                                    <div class="col-md-9">
                                        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                                        <span class="help-block">Tentukan Tanggal Pengembalian</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-form-label col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah Buku" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old("jumlah") }}">
                                        @error("jumlah")
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Modal Simpanan -->
    <div class="modal fade bd-example-modal-lg" id="listBuku" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" style="background: #fff;">
                <div class="modal-header">
                    <h5 class="modal-title"  id="exampleModalLabel">Cari Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_buku as $buku)
                        <tr class="pilih-buku" data-id_buku="{{ $buku->id }}" data-judul_buku="{{ $buku->judul }}">
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penulis }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->jumlah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Modal Buku -->
    <!-- Modal Buku Anggota -->
    <div class="modal fade bd-example-modal-lg" id="listBuku2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" style="background: #fff;">
                <div class="modal-header">
                    <h5 class="modal-title"  id="exampleModalLabel">Cari Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                <table id="lookup-buku" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_buku as $buku)
                        <tr class="pilih-buku-2" data-id_buku_2="{{ $buku->id }}" data-judul_buku_2="{{ $buku->judul }}">
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penulis }}</td>
                            <td>{{ $buku->penerbit }}</td>
                            <td>{{ $buku->jumlah }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Modal Buku -->
    <!-- Modal Anggota -->
    <div class="modal fade bd-example-modal-lg" id="listAnggota" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document" >
            <div class="modal-content" style="background: #fff;">
                <div class="modal-header">
                    <h5 class="modal-title"  id="exampleModalLabel">Cari Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                <table id="lookup-anggota" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($list_anggota as $anggota)
                        <tr class="pilih-anggota" data-id_anggota="{{ $anggota->id }}" data-nama_anggota="{{ $anggota->nama }}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->kelas->nama }}</td>
                            <td>{{ ($anggota->jk == 0) ? "Perempuan" : "Laki-laki" }}</td>
                            <td>{{ $anggota->no_tlp }}</td>
                            <td>{{ $anggota->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Modal Anggota -->
@endsection

@push('js')
<script>
    var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
    $("#class").select2({
      ajax: {
        url: "{{ route('kunjungan.getKelas') }}",
        type: "post",
        dataType: "json",
        delay: 250,
        data: function(params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term
          };
        },
        processResults: function(response){
          return {
            results: response
          };
        },
        cache: true
      }
    });

    $("#pilih-peminjaman").on("change", function(){
        var jenis = document.querySelector('input[name="jenis-pilihan"]:checked').value;


        if(jenis == "murid"){
            $("#form-murid").slideDown();
            $("#form-anggota").slideUp();
        }

        if(jenis == "anggota"){
            $("#form-murid").slideUp();
            $("#form-anggota").slideDown();
        }
    });

    $(function () {
        $("#lookup").dataTable({
            responsive: true,
            "paging":   false,
        });
    });
    $(function () {
        $("#lookup-buku").dataTable({
            responsive: true,
            "paging":   false,
        });
    });
    $(function () {
        $("#lookup-anggota").dataTable({
            responsive: true,
            "paging":   false,
        });
    });

    $(document).on('click', '.pilih-buku', function (e) {
        document.getElementById("id_buku").value = $(this).attr('data-id_buku');
        document.getElementById("judul_buku").value = $(this).attr('data-judul_buku');
        $("#listBuku").modal("hide");
    });
    $(document).on('click', '.pilih-buku-2', function (e) {
        document.getElementById("id_buku_2").value = $(this).attr('data-id_buku_2');
        document.getElementById("judul_buku_2").value = $(this).attr('data-judul_buku_2');
        $("#listBuku2").modal("hide");
    });
    $(document).on('click', '.pilih-anggota', function (e) {
        document.getElementById("id_anggota").value = $(this).attr('data-id_anggota');
        document.getElementById("nama_anggota").value = $(this).attr('data-nama_anggota');
        $("#listAnggota").modal("hide");
    });
</script>
@endpush