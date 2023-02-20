@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
<link href="{{asset ('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.min.css"')}} rel="stylesheet">

    {!! session('sukses') !!}

    <h1 class="h3 mb-4 text-gray-800">Data Kelas</h1>

    {{-- Table --}}
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/datakelas/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Kelas</a>
        </div>
        <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kelas</th>
            <th scope="col">Kompetensi Keahlian</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $row )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->nama_kelas }}</td>
                <td>{{ $row->kompetensi_keahlian }}</td>
                <td width="20%">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="/datakelas/{{ $row->id_kelas }}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                   <form action="/datakelas/{{ $row->id_kelas }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                   </form>
                </div>
                </div>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $kelas->links() }}

<script src="{{asset ('asset/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset ('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{asset ('asset/sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
