<?php

namespace App\Http\Controllers;

use App\Models\Biodata_1147;
use App\Models\Prodi;
use Illuminate\Http\Request;

class Biodata_1147Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataBiodata'] = Biodata_1147::with('prodi')->get();
        return view('admin.biodata.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['prodis'] = Prodi::all();
        return view('admin.biodata.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Logika penyimpanan yang menggunakan disk 'public'
        if ($request->hasFile('foto')) {
            // Otomatis menyimpan ke storage/app/public/profil
            $path = $request->file('foto')->store('profil', 'public');

            // Hanya mengambil nama file-nya saja untuk disimpan ke database
            $data['foto'] = basename($path);
        }

        Biodata_1147::create($data);
        return redirect()->route('biodata.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['biodata'] = Biodata_1147::findOrFail($id);
        $data['prodis'] = Prodi::all();

        return view('admin.biodata.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $biodata = Biodata_1147::findOrFail($id);
        $data = $request->all();

        // Cek apakah ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/profil', $foto->hashName());
            $data['foto'] = $foto->hashName();
        } else {
            // Jika tidak ada foto baru, hapus 'foto' dari array agar tidak menimpa data lama di database
            unset($data['foto']);
        }

        $biodata->update($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biodata = Biodata_1147::findOrFail($id);
        $biodata->delete();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil dihapus!');
    }
}
