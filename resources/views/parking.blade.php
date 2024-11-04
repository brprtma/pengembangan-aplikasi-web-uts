@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Daftar Kendaraan</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Plat Nomor</th>
            <th scope="col">Waktu Masuk</th>
            <th scope="col">Mall</th>
            <th scope="col">Ruang</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($parking as $park)
            <tr>
                <td><?= $i ?></td>
                <td>{{ $park->plat }}</td>
                <td>{{ $park->tanggal_masuk }}</td>
                <td>{{ $park->gedung->mall }}</td>
                <td>{{ $park->gedung->koderuang }}</td>
                <td>{{ $park->status }}</td>
                <td>
                    @if($park->status != 'keluar')
                        @if($park->status != 'parking')
                            @can('ruang', $user)
                                <a href="{{ route('parking.edit', $park->id) }}" class="btn btn-success">Parkir</a>
                            @endcan
                        @endif
                        @can('keluar', $user)
                            <a href="{{ route('parking.keluar', $park->id) }}" class="btn btn-danger">Keluar</a>
                        @endcan
                    @endif
                </td>
            </tr>
                <?php $i++; ?>
        @endforeach
        </tbody>
    </table>
    @can('masuk', $user)
        <div class="col-12">
            <a href="{{ route('parking.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
    @endcan
@endsection
