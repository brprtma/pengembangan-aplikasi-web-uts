@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Tambah Gedung Baru</h2>
    <form class="row g-3"  action="{{ route('gedung.store') }}" method="post">
        @csrf
        <div class="col-12">
            <label for="koderuang" class="form-label">Kode Ruang</label>
            <input type="text" class="form-control" id="koderuang" name="koderuang">
        </div>
        <div class="col-12">
            <label for="lantai" class="form-label">Lantai</label>
            <select id="lantai" class="form-select" name="lantai">
                <option selected>Pilih Lantai</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>
        <div class="col-12">
            <label for="mall" class="form-label">Mall</label>
            <select id="mall" class="form-select" name="mall">
                <option selected>Pilih Mall</option>
                <option value="Tunjungan Plaza">Tunjungan Plaza</option>
                <option value="Pakuwon Mall">Pakuwon Mall</option>
                <option value="Pakuwon City Mall">Pakuwon City Mall</option>
                <option value="Galaxy Mall">Galaxy Mall</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </form>
@endsection
