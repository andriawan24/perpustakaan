@extends('layouts.master')

@section('title', "Tambah Anggota | Perpustakaan SMK Negeri 2 bandung")

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-35 mt-4">Tambah Anggota</h3>

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-warning float-right text-light"><i class="fa fa-undo"></i> Back</a>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route("anggota.store") }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="nama" class="col-form-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ old("nama") }}">
                                        @if ($errors->has("nama"))
                                            <span class="help-block">{{ $errors->first("nama") }}</span>
                                        @else
                                            <span class="help-block">Nama Lengkap</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_kelas" class="col-form-label col-md-3">Kelas</label>
                                    <div class="col-md-9">
                                        <select name="id_kelas" autocomplete="off" id="class" class="@error('id_kelas') is-invalid @enderror">
                                            <option value="#">Pilih Kelas :</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-form-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" id="alamat" cols="23" rows="5" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat">{{ old("alamat") }}</textarea>
                                        @if ($errors->has("alamat"))
                                            <span class="help-block">{{ $errors->first("alamat") }}</span>
                                        @else
                                            <span class="help-block">Alamat Lengkap</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jk" class="col-form-label col-md-3">Jenis Kelamin</label>
                                    <div class="col-md-9">
                                        <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror">
                                            <option value="#">Pilih Jenis Kelamin</option>
                                            <option value="0">Perempuan</option>
                                            <option value="1">Laki-laki</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_tlp" class="col-form-label col-md-3">No. Telepon</label>
                                    <div class="col-md-9">
                                        <input type="text" name="no_tlp" id="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror" placeholder="Masukkan No. Telepon" value="{{ old("no_tlp") }}">
                                        @if ($errors->has("no_tlp"))
                                            <span class="help-block">{{ $errors->first("no_tlp") }}</span>
                                        @else
                                            <span class="help-block">Pastikan No. Telepon aktif dan bisa dihubungi</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tlp_ortu" class="col-form-label col-md-3">No. Telepon Orang Tua</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tlp_ortu" id="tlp_ortu" class="form-control @error('tlp_ortu') is-invalid @enderror" placeholder="Masukkan No. Telepon" value="{{ old("tlp_ortu") }}">
                                        @if ($errors->has("tlp_ortu"))
                                            <span class="help-block">{{ $errors->first("tlp_ortu") }}</span>
                                        @else
                                            <span class="help-block">Pastikan No. Telepon orang tua (Jika ada)</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email" name="email" placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        @if ($errors->has("email"))
                                            <span class="help-block">{{ $errors->first("email") }}</span>
                                        @else
                                            <span class="help-block">Email Valid yang bisa dihubungi</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password" class="form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror">
                                        @if ($errors->has("password"))
                                            <span class="help-block">{{ $errors->first("password") }}</span>
                                        @else
                                            <span class="help-block">Min. 8, tidak boleh ada spasi</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="confirm_password" class=" form-control-label">Konfirmasi Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Ulang Password" class="form-control">
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
</script>
@endpush