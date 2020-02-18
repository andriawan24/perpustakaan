@extends('layouts.master')

@section('title', "Daftar Kunjungan | Perpustakaan SMK Negeri 2 Kota Bandung")

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-35 mt-4">Daftar Kunjungan</h3>

                    <input type="text" class="au-input au-input--xl" id="input-search" name="search" placeholder="Cari di Kunjungan">
                    
                    <div class="rs-select2--light rs-select2--sm">
                        <select name="sort" id="sort" class="js-select2">
                            <option value="0">Sort By</option>
                            <option value="nama">Nama</option>
                            <option value="id_kelas">Kelas</option>
                            <option value="is_anggota">Status</option>
                        </select>
                    <div class="dropDownSelect2"></div>
                    </div>
                
                    <div class="table-responsive table-responsive-data2 mt-5">
                        <table class="table table-data2" id="table-agt">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Alamat</th>
                                    <th>No. Tlp</th>
                                    <th>Waktu Kunjungan</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kunjungan_murid as $val)
                                    <tr class="tr-shadow">
                                        <td>{{ $val->nama }}</td>
                                        <td>{{ $val->kelas->nama }}</td>
                                        <td>{{ $val->alamat }}</td>
                                        <td>{{ $val->no_tlp }}</td>
                                        <td>{{ date("h:i d/m/Y", strtotime($val->waktu_kunjungan)) }}</td>
                                        <td>{{ ($val->is_anggota == 0) ? "Bukan Anggota" : "Anggota" }}</td>
                                    </tr>
                                    <tr class="spacer"></tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4">
                                    {{ $kunjungan_murid->links() }}    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script text="text/javascript">
    $("#sort").change(function () {
        $input = $(this).val();
        console.log($input);

        $.ajax({
            type: "GET",
            url: "{{ route('kunjungan.filter') }}",
            data: {"sort" : $input},
            success:function(data){
                $("tbody").html(data);
            }
        });
    })
</script>
<script text="text/javascript">
    $.ajaxSetup({headers: {'csrftoken' : '{{ csrf_token() }}' }})
</script>
@endsection