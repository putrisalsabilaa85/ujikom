@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
<link href="{{asset ('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css"')}} rel="stylesheet">

{!! session('sukses') !!}

<h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>

{{-- <a href="/datasiswa/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Siswa</a> --}}

{{-- Table --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="/datasiswa/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Siswa</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nisn</th>
        <th scope="col">Nis</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">No Telpon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($siswa as $row)
      <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $row->nisn }}</td>
        <td>{{ $row->nis }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->kelas->nama_kelas }} {{ $row->kelas->kompetensi_keahlian }}</td>
        <td>{{ $row->no_telp }}</td>
        <td>{{ $row->alamat }}</td>
        <td  width="20%">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/datasiswa/{{ $row->nisn }}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i>Edit</a>
                    <form action="/datasiswa/{{ $row->nisn }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $siswa->links() }}

<script src="{{asset ('asset/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{asset ('asset/sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
