@extends('layouts.master')

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-1 m-b-35 mt-4">Anggota</h3>

                    <form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Cari Anggota" />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>


                    <div class="table-responsive table-responsive-data2 mt-5">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Jumlah Kunjungan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $val)
                                <tr class="tr-shadow">
                                    <td>{{ $val->nama }}</td>
                                    <td style="width: 90px">{{ $val->kelas->nama }}</td>
                                    <td>
                                        <span class="block-email">{{ $val->email }}</span>
                                    </td>
                                    <td>{{ $val->no_tlp }}</td>
                                    <td>{{ $val->jumlah_kunjungan }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-info"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Footer --}}
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2019 Fall. All rights reserved <a href="https://andriawan24.github.io">Team Naufal Fawwaz & Nur Iman</a>.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection