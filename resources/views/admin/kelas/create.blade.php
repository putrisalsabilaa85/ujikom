@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Kelas</h1>

    <form action="{{ route('datakelas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Kelas</label>
            {{-- <select class="form-control" id="nama" name="nama_kelas">
                <option value="" selected>Pilih kelas</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                @endforeach
            </select> --}}
            <input type="text" class="form-control" id="nama" name="nama_kelas">
            @error('nama_kelas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Kompetensi Keahlian</label>
            {{-- <select class="form-control" id="nama" name="kompetensi_keahlian">
                <option value="" selected>Pilih Kompetensi Keahlian</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id_kelas }}">{{ $item->kompetensi_keahlian }}</option>
                @endforeach
            </select> --}}
            <input type="text" class="form-control" id="nama" name="kompetensi_keahlian">
            @error('kompetensi_keahlian')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <a href="/datakelas" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</form>
@endsection
