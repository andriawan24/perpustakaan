@extends('layouts.master')

@section('title', "Dashboard | Perpustakaan SMK Negeri 2 Kota Bandung")

@section('content')
<!-- STATISTIC-->
<section class="statistic">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">{{ $anggota->count() }}</h2>
                        <span class="desc">Anggota</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">{{ $buku->count() }}</h2>
                        <span class="desc">Buku</span>
                        <div class="icon">
                            <i class="zmdi zmdi-book"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">{{ $peminjaman->count() }}</h2>
                        <span class="desc">Peminjaman</span>
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="statistic__item">
                        <h2 class="number">{{ $kunjungan->count() }}</h2>
                        <span class="desc">Kunjungan</span>
                        <div class="icon">
                            <i class="zmdi zmdi-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END STATISTIC-->

<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="rs-select2--light rs-select2--md">
                        <select class="js-select2" name="property" id="check-pinjam">
                            <option value="murid">Peminjaman Murid</option>
                            <option value="anggota">Peminjaman Anggota</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>

                    <a href="{{ route("peminjaman.pinjam") }}" class="au-btn au-btn-icon au-btn--green au-btn--small ml-4 text-light">
                        <i class="zmdi zmdi-plus"></i>Tambah Peminjaman</a>
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40 m-t-30" id="table-murid">
                        
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Kelas</th>
                                    <th>Buku</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Pengajar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman_kelas as $val)
                                <tr>
                                    <td>{{ $val->kelas->nama }}</td>
                                    <td>{{ $val->buku->judul }}</td>
                                    <td>{{ $val->jumlah }}</td>
                                    <td>{{ date("d/m/Y", strtotime($val->tanggal)) }}</td>
                                    <td>{{ $val->jam_pelajaran }}</td>
                                    <td>{{ $val->guru_mapel }}</td>
                                    <td class="{{ ($val->status == 0) ? "process" : "denied" }}">{{ ($val->status == 0) ? "Dipinjam" : "Dikembalikan"}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive m-b-40 m-t-30" style="display:none" id="table-anggota">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Buku</th>
                                    <th style="width: 10px">Jumlah</th>
                                    <th style="width: 140px">Tanggal Pinjam</th>
                                    <th style="width: 140px">Tanggal Kembali</th>
                                    <th style="width: 100px">Status</th >
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjaman as $agt)
                                <tr>
                                    <td>{{ $agt->anggota->nama }}</td>
                                    <td>{{ $agt->buku->judul }}</td>
                                    <td>{{ $agt->jumlah }}</td>
                                    <td>{{ date("d m Y", strtotime($agt->tanggal_pinjam)) }}</td>
                                    <td>{{ date("d m Y", strtotime($agt->tanggal_kembali)) }}</td>
                                    <td class="{{ ($val->status == 0) ? "process" : "denied" }}">{{ ($val->status == 0) ? "Dipinjam" : "Dikembalikan"}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PAGE CONTAINER-->
@endsection