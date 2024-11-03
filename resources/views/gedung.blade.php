@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Daftar Lantai Gedung</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Ruang</th>
            <th scope="col">Lantai</th>
            <th scope="col">Mall</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($gedung as $g)
        <tr>
            <td><?= $i ?></td>
            <td>{{ $g->koderuang }}</td>
            <td>{{ $g->lantai }}</td>
            <td>{{ $g->mall }}</td>
            <td>
                <a href="{{ route('gedung.edit', $g->id) }}">Edit</a>
                <form action="{{ route('gedung.destroy', $g->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Apakah anda ingin menghapus ?')" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
            <?php $i++; ?>
        @endforeach
        </tbody>
    </table>
    <div class="col-12">
        <a href="{{ route('gedung.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
@endsection
