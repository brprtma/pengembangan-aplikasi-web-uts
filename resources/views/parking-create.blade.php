@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Tambah User Baru</h2>
    <form class="row g-3"  action="{{ route('parking.store') }}" method="post">
        @csrf
        <div class="col-12">
            <label for="plat" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control" id="plat" name="plat" required>
        </div>
        <div class="col-12">
            <input type="hidden" class="form-control" id="plat" name="tanggal_masuk" value="{{ now() }}">
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
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
@endsection
