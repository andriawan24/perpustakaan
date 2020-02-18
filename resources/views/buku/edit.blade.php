@extends('layouts.master')

@section('title', "Update Buku | Perpustakaan SMK Negeri 2 bandung")

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-35 mt-4">Update Buku</h3>

                    <div class="card">
                        <div class="card-header">
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-warning float-right text-light"><i class="fa fa-undo"></i> Back</a>
                        </div>
                        <div class="card-body card-block">
                            <form action="{{ route("buku.update", $buku->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group row">
                                    <label for="cover" class="col-form-label col-md-3">Cover</label>
                                    <div class="col-md-9">
                                        <input type="file" name="cover" id="cover" class="@error('cover') is-invalid @enderror" value="{{ old("cover") }}">
                                        @if ($errors->has("cover"))
                                            <span class="help-block">{{ $errors->first("cover") }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="judul" class="col-form-label col-md-3">Judul</label>
                                    <div class="col-md-9">
                                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul" value="{{ $buku->judul }}">
                                        @error("judul")
                                            <span class="help-block invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penulis" class="col-form-label col-md-3">Penulis</label>
                                    <div class="col-md-9">
                                        <input type="text" name="penulis" id="penulis" class="form-control" value="{{ $buku->penulis }}" placeholder="Masukkan Nama Penulis">
                                        @error("penulis")
                                            <span class="help-block invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="penerbit" class="col-form-label col-md-3">Penerbit</label>
                                    <div class="col-md-9">
                                        <input type="text" name="penerbit" id="penerbit" class="form-control" value="{{ $buku->penerbit }}" placeholder="Masukkan Nama Penerbit">
                                        @error("penerbit")
                                            <span class="help-block invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-form-label col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $buku->jumlah }}" placeholder="Masukkan Stok Buku">
                                        @error("jumlah")
                                            <span class="help-block invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-paper-plane"></i> Submit
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