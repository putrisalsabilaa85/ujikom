<?php

namespace App\Http\Controllers;


use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::select('id_spp', 'tahun', 'nominal')->latest()->simplePaginate(5);
        return view('admin/dataspp', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/spp/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate([
            'id_spp' => 'required',
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        Spp::create(([
            'id_spp' => $request->id_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]));

        dd($request);

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Spp Berhasil Ditambahkan!
        // </div>
        // ');
        return redirect('/dataspp');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dataspp)
    {
       $spp = Spp::select('id_spp', 'tahun', 'nominal')->where('id_spp', $dataspp)->first();
       return view('admin/spp/edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dataspp)

    {
        $request->validate([
            'id_spp' => 'required',
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        Spp::where('id_spp', $dataspp)->update([
            'id_spp' => $request->id_spp,
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Siswa Berhasil Diedit!
        // </div>
        // ');
        return redirect('/dataspp');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $dataspp)

    {
        Spp::where('id_spp', $dataspp)->delete();

        // $request->session()->flash('sukses', '
        // <div class="alert alert-success" role="alert">
        //      Data Siswa Berhasil Dihapus!
        // </div>
        // ');
        return redirect('/dataspp');
    }
}
