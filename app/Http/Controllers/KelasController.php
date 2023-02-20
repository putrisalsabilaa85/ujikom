<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $siswa = Siswa::all();
        $kelas = Kelas::select('id_kelas', 'nama_kelas', 'kompetensi_keahlian')->latest()->paginate(5);
        return view('admin/datakelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('admin.kelas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required',
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);


        Kelas::create(([
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]));

        // $request->session()->flash('sukses', '
        //     <div class="alert alert-success" role="alert">
        //         Data Kelas Berhasil Ditambahkan!
        //     </div>
        // ');

        dd($request);
         return redirect('datakelas');
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
    public function edit($datakelas)
    {
        $kelas = Kelas::select('id_kelas', 'nama_kelas', 'kompetensi_keahlian')->where('id_kelas', $datakelas)->first();
        return view('admin/kelas/edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $datakelas)
    {
        $request->validate([
            'id_kelas' => 'required',
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        Kelas::where('id_kelas', $datakelas)->update([
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        // $request->session()->flash('sukses', '
        //     <div class="alert alert-success" role="alert">
        //         Data Kelas Berhasil Diedit!
        //     </div>
        // ');
        return redirect('admin.datakelas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $datakelas )
    {
        Kelas::where('id_kelas', $datakelas)->delete();

        // $request->session()->flash('sukses', '
        //     <div class="alert alert-success" role="alert">
        //         Data Kelas Berhasil Dihapus!
        //     </div>
        // ');
        return redirect('admin.datakelas');

    }
}
