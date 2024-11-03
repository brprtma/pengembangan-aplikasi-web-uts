@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Daftar User</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Mall</th>
            <th scope="col">Ruang</th>
            <th scope="col">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($users as $user)
            <tr>
                <td><?= $i ?></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->gedung->mall }}</td>
                <td>{{ $user->gedung->koderuang }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
@endsection
