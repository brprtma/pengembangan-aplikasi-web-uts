@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Parking Keluar</h2>
    <form class="row g-3"  action="{{ route('parking.out', $parking->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="status" class="form-label">Plat Nomor</label>
            <select id="status" class="form-select" name="status">
                <option value="{{ $parking->id }}">{{ $parking->plat }}</option>
            </select>
        </div>
        <div class="col-12">
            <input type="hidden" class="form-control" id="plat" name="tanggal_keluar" value="{{ now() }}">
        </div>
        <div class="col-12">
            <label for="status" class="form-label">Status</label>
            <select id="status" class="form-select" name="status">
                <option value="keluar">Keluar</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-danger">Keluar Parkir</button>
        </div>
    </form>
@endsection
