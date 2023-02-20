@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Spp</h1>

    <form action="{{ route('dataspp.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Tahun</label>
            <input type="text" class="form-control" id="nama" name="tahun">
            @error('tahun')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nominal</label>
            <input type="text" class="form-control" id="nama" name="nominal">
            @error('nominal')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <a href="/dataspp" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </form>

@endsection
