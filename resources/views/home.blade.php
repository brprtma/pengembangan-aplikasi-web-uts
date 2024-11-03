@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Menu Kontrol {{ auth()->user()->role }}</h2>
    @can('kelola-user', $user)
        <a href="{{ route('gedung.index') }}" class="btn btn-primary btn-block">Kelola Gedung</a>
        <a href="{{ route('user.index') }}" class="btn btn-success btn-block">Kelola User</a>
        <a href="" class="btn btn-info btn-danger">Laporan</a>
    @endcan
    <a href="{{ route('parking.index') }}" class="btn btn-info btn-block">Ruang Parkir</a>
@endsection
