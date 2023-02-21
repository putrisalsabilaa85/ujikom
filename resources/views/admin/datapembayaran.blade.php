@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
{!! session('sukses') !!}

    <h1 class="h3 mb-4 text-gray-800">Data Pembayaran</h1>

    {{-- Table --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/datapembayaran/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Transaksi Pembayaran</a>
        </div>
     <div class="card-body">
        <div class="table-responsive">

    <table class="table mt-4 table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nisn</th>
            <th scope="col">Jumlah Bayar</th>
            <th scope="col">Tanggal Bayar</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pembayaran as $row)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $row->nisn }}</td>
            <td>{{ $row->jumlah_bayar }}</td>
            <td>{{ $row->tgl_bayar }}</td>
            <td width="20%">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/datapembayaran/{{ $row->id_pembayaran }}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
            </td>
          </tr>

          @endforeach

          {{ $pembayaran->links() }}
          <script src="{{asset ('template/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
          <script src="{{asset ('template/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

          <!-- Page level custom scripts -->
          <script src="{{asset ('template/sb-admin/js/demo/datatables-demo.js') }}"></script>
        @endsection
