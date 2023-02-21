<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::select('id_pembayaran', 'tgl_bayar', 'jumlah_bayar')->latest()->SimplePaginate(5);
        return view('admin/datapembayaran', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/pembayaran/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
          'id_pembayaran' => 'required',
        //   'id_petugas' => 'required',
        //   'nisn' => 'required',
          'tgl_bayar' => 'required',
        //   'bulan_dibayar' => 'required',
        //   'tahun_dibayar' => 'required',
        //   'id_spp' => 'required',
          'jumlah_bayar' => 'required',
       ]);

       Pembayaran::create([
            'id_pembayaran' => $request->id_pembayaran,
            // 'id_petugas' => $request->id_petugas,
            // 'nisn' => $request->nisn,
            'tgl_bayar' => $request->tgl_bayar,
            // 'bulan_dibayar' => $request->bulan_dibayar,
            // 'tahun_dibayar' => $request->tahun_dibayar,
            //  'id_spp' => $request->id_spp,
             'jumlah_bayar' => $request->jumlah_bayar,
       ]);

       return redirect('/datapembayaran');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($datapembayaran)
    {
       $pembayaran = Pembayaran::select('id_pembayaran', 'tgl_bayar', 'jumlah_bayar')->where('id_petugas', $datapembayaran)->first();
       return view('admin/pembayaran/edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
    }
}
