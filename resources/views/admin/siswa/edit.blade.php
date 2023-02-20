@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Data Siswa</h1>

    <form action="/datasiswa/{{ $siswa->nisn }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nama">Nisn</label>
          <input type="text" class="form-control" id="nama" name="nisn" value="{{ $siswa->nisn }}">
          @error('nisn')
          <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nis</label>
            <input type="text" class="form-control" id="nama" name="nis" value="{{ $siswa->nis }}">
            @error('nis')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
            @error('nama')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Kelas</label>
            <select class="form-control" id="nama" name="id_kelas">
                <option value="" selected>Pilih kelas</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id_kelas }}" {{ $item->id_kelas == $siswa->id_kelas ? 'selected' : "" }}>{{ $item->nama_kelas }} {{ $item->kompetensi_keahlian }}</option>
                @endforeach
            </select>
            @error('id_kelas')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nomor Telpon</label>
            <input type="text" class="form-control" id="nama" name="no_telp" value="{{ $siswa->no_telp }}">
            @error('no_telp')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Alamat</label>
            <input type="text" class="form-control" id="nama" name="alamat" value="{{ $siswa->alamat }}">
            @error('alamat')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            <a href="/datasiswa" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
      </form>
@endsection
