<?php

namespace App\Http\Controllers;


use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::select('nisn','nis','nama', 'id_kelas', 'alamat', 'no_telp')->latest()->simplePaginate(5);
        return view('admin/datasiswa', compact('siswa', 'kelas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin/siswa/create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::create(([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]));

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Siswa Berhasil Ditambahkan!
        // </div>
        // ');
        return redirect('/datasiswa');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($datasiswa)
    {
        $siswa = Siswa::select('nisn','nis','nama', 'id_kelas', 'alamat', 'no_telp')->where('nisn', $datasiswa)->first();
        $kelas = Kelas::all();
        return view('admin/siswa/edit', compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $datasiswa)
    {
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        // dd($request->all());
        DB::table('siswa')->where('nisn', $datasiswa)->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Siswa Berhasil Diedit!
        // </div>
        // ');
        return redirect('/datasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $datasiswa)
    {

        Siswa::where('nisn', $datasiswa)->delete();

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Siswa Berhasil Dihapus!
        // </div>
        // ');
        return redirect('/datasiswa');
    }
}
