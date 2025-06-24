<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Resources\MahasiswaResource;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json([
            'data' => $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:16|unique:mahasiswa,nim',
            'nama' => 'required|string|max:255',
            'jk' => 'required|string|max:10',
            'tgl_lahir' => 'required|date',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);
        $mahasiswa = Mahasiswa::create($validatedData);
        return (new MahasiswaResource($mahasiswa))
        ->additional([
            'status' => true,
            'message' => 'Data mahasiswa berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return (new MahasiswaResource($mahasiswa))
        ->additional([
            'status' => true,
            'message' => 'Data mahasiswa berhasil diambil',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jk' => 'required|string|max:10',
            'tgl_lahir' => 'required|date',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validatedData);
        return (new MahasiswaResource($mahasiswa))
        ->additional([
            'status' => true,
            'message' => 'Data mahasiswa berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data mahasiswa berhasil dihapus',
        ]);
    }
}
