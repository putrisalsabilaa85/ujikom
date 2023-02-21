@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Transaksi Pembayaran</h1>

    {{-- Table --}}

    <form action="/datapembayaran" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nisn</label>
            <input type="text" class="form-control" id="nama" name="nisn">
            @error('nisn')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Jumlah Bayar</label>
            <input type="text" class="form-control" id="nama" name="jumlah_bayar">
            @error('jumlah_bayar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">Tanggal Bayar</label>
            <input type="date" class="form-control" id="nama" name="tgl_bayar">
            @error('tgl_bayar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
        <a href="/datapembayaran" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>

@endsection
