<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $petugas = Petugas::select('id_petugas', 'username', 'password', 'nama_petugas', 'level')->latest()->simplePaginate(5);
        return view('admin.datapetugas', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        return view('admin/petugas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate(([
            'id_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]));

        Petugas::create(([
            'id_petugas' => $request->id_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]));

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Petugas Berhasil Ditambahkan!
        // </div>
        // ');
        dd($request);
        // return redirect('/datapetugas');
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
    public function edit($datapetugas)

    {
        $petugas = Petugas::select('id_petugas', 'username', 'password', 'nama_petugas', 'level')->where('id_petugas', $datapetugas)->first();
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $datapetugas)

    {
        $request->validate(([
            'id_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]));

        Petugas::where('id_petugas', $datapetugas)->update([
            'id_petugas' => $request->id_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'nama_petugas' => $request->nama_petugas,
            'level' => $request->level,
        ]);

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Petugas Berhasil Diedit!
        // </div>
        // ');
         return redirect('/datapetugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $datapetugas)
    {
        Petugas::where('id_petugas', $datapetugas)->delete();

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Siswa Berhasil Dihapus!
        // </div>
        // ');
        return redirect('/datapetugas');


    }
}
