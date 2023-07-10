<?php

namespace App\Http\Controllers;

use App\data_mahasiswa;
use App\data_prodi;
use Illuminate\Http\Request;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(data_mahasiswa $data_mahasiswa)
    {
        $data_mahasiswa = data_mahasiswa::latest()->get();
        return view('datamahasiswa.data_mahasiswa', [
            'data_mahasiswa' => $data_mahasiswa,
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
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'id_prodi' => 'required',
        ]);
        
        // Masukan Ke database
        data_mahasiswa::create([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'id_prodi' => $request->id_prodi,
        ]);

        return back()->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data_mahasiswa  $data_mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(data_mahasiswa $data_mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data_mahasiswa  $data_mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(data_mahasiswa $data_mahasiswa, $id)
    {
        $data_mahasiswa = data_mahasiswa::where('id', $id)->first();
        return view('datamahasiswa.data_mahasiswa_edit', [
            'data_mahasiswa' => $data_mahasiswa,
            'data_prodi' => data_prodi::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data_mahasiswa  $data_mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, data_mahasiswa $data_mahasiswa, $id)
    {
        data_mahasiswa::where('id', $id)->update([
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'id_prodi' => $request->id_prodi,
        ]);
        return redirect('datamahasiswa')->with('toast_success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data_mahasiswa  $data_mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(data_mahasiswa $data_mahasiswa, $id)
    {
        data_mahasiswa::where('id', $id)->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
