@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Data Petugas</h1>

    <form action="/datapetugas/{{ $petugas->id_petugas }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama_petugas" value="{{ $petugas->nama_petugas }}">
          @error('nama_petugas')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
            <label for="nama">Email</label>
            <input type="text" class="form-control" id="nama" name="username" value="{{ $petugas->username }}">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
          <div class="mb-3">
            <label for="nama">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="{{ $petugas->password }}">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nama">Level</label>
            <input type="text" class="form-control" id="nama" name="level" value="{{ $petugas->level }}">
            @error('level')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="/datapetugas" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
      </form>

@endsection
