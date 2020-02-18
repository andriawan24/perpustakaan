<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Email</th>
            <th>No. Telepon</th>
            <th>Jumlah Kunjungan</th>
            <th>Tanggal Masuk Anggota</th>
        </tr>
    </thead>
    <tbody> 
        @php
            $no=1
        @endphp
        @foreach ($anggota as $val)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $val->nama }}</td>
                <td>{{ $val->kelas->nama }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->no_tlp }}</td>
                <td>{{ $val->jumlah_kunjungan }}</td>
                <td>{{ date("y m d", strtotime($val->created_at)) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>