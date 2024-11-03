@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Edit Gedung</h2>
    <form class="row g-3"  action="{{ route('user.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="name" required value="{{ $user->name }}">
        </div>
        <div class="col-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ $user->email }}">
        </div>
        <div class="col-12">
            <label for="role" class="form-label">Role</label>
            <select id="role" class="form-select" name="role">
                <option selected>Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="Petugas Masuk">Petugas Masuk</option>
                <option value="Petugas Ruang">Petugas Ruang</option>
                <option value="Petugas Keluar">Petugsa Keluar</option>
            </select>
        </div>
        <div class="col-12">
            <label for="gedung" class="form-label">Gedung</label>
            <select id="gedung" class="form-select" name="gedung_id">
                <option selected>Pilih Gedung</option>
                @foreach($gedung as $g)
                    <option value="{{ $g->id }}">{{ $g->mall }} - {{ $g->koderuang }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Edit Data</button>
        </div>
    </form>
@endsection
