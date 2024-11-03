@extends('layouts.main')

@section('konten')
    <h2 class="text-center md-5">Parking</h2>
    <form class="row g-3"  action="{{ route('parking.update', $parking->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-12">
            <label for="status" class="form-label">Status</label>
            <select id="status" class="form-select" name="status">
                <option value="parking">Parkir</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Parkir Sekarang !</button>
        </div>
    </form>
@endsection
