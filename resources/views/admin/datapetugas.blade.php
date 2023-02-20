@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
{!! session('sukses') !!}

    <h1 class="h3 mb-4 text-gray-800">Data Petugas</h1>

     {{-- Table --}}
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/datapetugas/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Siswa</a>
        </div>
        <div class="card-body">
        <div class="table-responsive">

     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Petugas</th>
            <th scope="col">username</th>
            <th scope="col">Level</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($petugas as $row )
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $row->nama_petugas }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->level }}</td>
            <td width="20%">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/datapetugas/{{ $row->id_petugas }}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                <form action="/datapetugas/{{ $row->id_petugas }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                </form>
                </div>
            </td>
            @endforeach
          </tbody>
     </table>

    {{ $petugas->links() }}

    <script src="{{asset ('template/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset ('template/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('template/sb-admin/js/demo/datatables-demo.js') }}"></script>
@endsection
