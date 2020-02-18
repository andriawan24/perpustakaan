@extends('layouts.master')

@section('title', "Anggota | Perpustakaan SMK Negeri 2 Kota Bandung")

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-1 m-b-35 mt-4">Anggota</h3>

                    <input class="au-input au-input--xl" type="text" id="input-search" name="search" placeholder="Cari Anggota" />
                    
                    <a href="{{ route('anggota.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small ml-4 text-light">
                        <i class="zmdi zmdi-plus"></i>Tambah Anggota</a>

                    <div class="table-responsive table-responsive-data2 mt-5">
                        <table class="table table-data2" id="table-agt">
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
                                            <a class="item" href="{{ route("anggota.edit", $val->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <form id="hapus_<?= $val->id ?>" key="<?= $val->id ?>" class="mr-1" action="{{ route('anggota.destroy', $val->id) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="item" type="button" data-toggle="tooltip" data-placement="top" onclick="hapus(<?= $val->id ?>)" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                            <a class="item" href="{{ route("anggota.detail", $val->id) }}" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-info"></i>
                                            </a>
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
                                    {{ $anggota->links() }}    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

    function hapus(id) {
        key = id;
        console.log(key);
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
                $("form#hapus_" + id).submit();
                }, 800
            );
            }else{
            return false;
            }
        })
    }

    $("#input-search").keyup(function(){
        $input = $(this).val();
        $.ajax({
            type: "GET",
            url : "{{ route('anggota.search') }}",
            data : {'search' : $input},
            success:function(data){ 
                $('tbody').html(data);
            }
        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({headers: {'csrftoken' : "{{ csrf_token() }}"}})
</script>
@endsection