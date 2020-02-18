@extends('layouts.master')

@section('title', "Buku | Perpustakaan SMK Negeri 2 Kota Bandung")

@section('content')
    <section>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title-1 m-b-35 mt-4">Buku</h3>

                        <input type="text" class="au-input au-input--xl" id="input-search" name="search" placeholder="Cari Buku...">

                        <a href="{{ route("buku.create") }}" class="au-btn au-btn-icon au-btn--green au-btn--small ml-4 text-light">
                            <i class="zmdi zmdi-plus"></i> Tambah Buku</a>

                        <div class="table-responsive table-responsive-data2 mt-5">
                            <table class="table table-data2" id="table-agt">
                                <thead>
                                    <tr>
                                        <th>Cover</th>
                                        <th>Judul</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Stok</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $val)
                                    <tr class="shadow">
                                        <td><img src="{{ "img/book_cover/" . $val->cover  }}" style="max-height: 150px; width:100px" alt="Cover Buku"  style="margin:10px"></td>
                                        <td>{{ $val->judul }}</td>
                                        <td>{{ $val->penulis }}</td>
                                        <td>{{ $val->penerbit }}</td>
                                        <td>{{ date("d/m/Y", strtotime($val->tanggal_regis)) }}</td>
                                        <td>{{ $val->jumlah }}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a class="item" href="{{ route("buku.edit", $val->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <form id="hapus" class="mr-1" action="{{ route('buku.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </form>
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
                            <div class="mt-3">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-4">
                                        {{ $buku->links() }}    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $("#input-search").keyup(function(){
            $input = $(this).val();
            console.log($input);
            $.ajax({
                type: "GET",
                url: "{{ route('buku.search') }}",
                data: {'search' : $input},
                success:function(data){
                    $('tbody').html(data);
                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({headers: {'csrftoken' : '{{ csrf_token() }}' }})
    </script>
    
@endsection