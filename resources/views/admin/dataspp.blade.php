@extends('layout.app')
@section('title','SPP | SMK AL-AMANAH')

@section('content')
{!! session('sukses') !!}
    <h1 class="h3 mb-4 text-gray-800">Data Spp</h1>

    {{--Table--}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/dataspp/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Spp</a>
        </div>
        <div class="card-body">
        <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Nominal</th>
                <th scope="col">Aksi</th>
              </tr>
        </thead>
        <tbody>
            @foreach ($spp as $row )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->tahun }}</td>
                <td>{{ $row->nominal }}</td>
                <td width="20%">
                    <a href="/dataspp/{{ $row->id_spp }}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                    <form action="/dataspp/{{ $row->id_spp }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach

    {{ $spp->links() }}

    <script src="{{asset ('asset/sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset ('asset/sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset ('asset/sb-admin/js/demo/datatables-demo.js') }}"></script>

@endsection
