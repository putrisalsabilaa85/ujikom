@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Data Kelas</h1>

    <form action="/datakelas/{{ $kelas->id_kelas }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Kelas</label>
            <input type="text" class="form-control" id="nama" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
            @error('nama_kelas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Kompetensi Keahlian</label>
            <input type="text" class="form-control" id="nama" name="kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}">
            @error('kompetensi_keahlian')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <a href="/datakelas" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</form>
@endsection
