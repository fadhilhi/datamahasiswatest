<?php

namespace App\Http\Controllers;

use App\data_matakuliah;
use App\data_prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data_prodi = data_prodi::with('data_matakuliah')->get();
        return view('dataprodi.data_prodi', compact('data_prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
        ]);

        // Masukan Ke database
        data_prodi::create([
            'nama_prodi' => $request->nama_prodi,
        ]);

        return back()->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_prodi  $data_prodi
     * @return \Illuminate\Http\Response
     */
    public function show(data_prodi $data_prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_prodi  $data_prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(data_prodi $data_prodi, $id)
    {
        $data_prodi = data_prodi::where('id', $id)->first();
        return view('dataprodi.data_prodi_edit', ['data_prodi' => $data_prodi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data_prodi  $data_prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_prodi $data_prodi, $id)
    {
        data_prodi::where('id', $id)->update([
            'nama_prodi' => $request->nama_prodi,
        ]);
        return redirect('/dataprodi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_prodi  $data_prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_prodi $data_prodi, $id)
    {
        data_prodi::where('id', $id)->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
