@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data Petugas</h1>

    <form action="/datapetugas" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama_petugas">
          @error('nama_petugas')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="mb-3">
            <label for="nama">Username</label>
            <input type="text" class="form-control" id="nama" name="username">
            @error('username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
          <div class="mb-3">
            <label for="nama">Password</label>
            <input type="text" class="form-control" id="password" name="password">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nama">Level</label>
            <input type="text" class="form-control" id="nama" name="level">
            @error('level')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
          <a href="/datapetugas" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
      </form>

@endsection
