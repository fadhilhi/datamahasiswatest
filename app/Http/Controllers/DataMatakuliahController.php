<?php

namespace App\Http\Controllers;

use App\data_mahasiswa;
use App\data_matakuliah;
use App\data_prodi;
use Illuminate\Http\Request;

class DataMatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_matakuliah = data_matakuliah::latest()->get();
        return view('datamatakuliah.data_matkul', [
            'data_matakuliah' => $data_matakuliah,
            'data_prodi' => data_prodi::get(),  
        ]);
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
            'nama_matakuliah' => 'required',
            'id_prodi' => 'required',
        ]);
        
        // Masukan Ke database
        data_matakuliah::create([
            'nama_matakuliah' => $request->nama_matakuliah,
            'id_prodi' => $request->id_prodi,
        ]);

        return back()->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_matakuliah  $data_matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(data_matakuliah $data_matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_matakuliah  $data_matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(data_matakuliah $data_matakuliah, $id)
    {
        $data_matakuliah = data_matakuliah::where('id', $id)->first();
        return view('datamatakuliah.data_matkul_edit', [
            'data_matakuliah' => $data_matakuliah,
            'data_prodi' => data_prodi::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data_matakuliah  $data_matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_matakuliah $data_matakuliah, $id)
    {
        data_matakuliah::where('id', $id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'id_prodi' => $request->id_prodi,
        ]);
        return redirect('datamatkul')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_matakuliah  $data_matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_matakuliah $data_matakuliah, $id)
    {
        data_matakuliah::where('id', $id)->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
