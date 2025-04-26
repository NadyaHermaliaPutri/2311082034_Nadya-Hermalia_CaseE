<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pets = Pet::paginate(10);
        return view('hewan/index',compact  ('pets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('hewan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_hewan'=>'required|string|max:255',
            'jenis_hewan'=>'required|string|max:255',
            'ras'=> 'required|string|max:255',
            'tanggal_lahir'=> 'required|date',
            'nama_pemilik'=> 'required|string|max:255',
            'kontak_pemilik'=> 'required|string|max:255',
            'status'=> 'required|in:aktif,tidak aktif'
           
        ]);
        Pet::create($request->all());
    return redirect()->route('hewan.index')->with('success', 'Data Hewan Berhasil ditambahkan');
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
        //
         //
         $pets = Pet::findOrFail($id);
         return view('hewan.edit', compact('pets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
           'nama_hewan'=>'required|string|max:255',
            'jenis_hewan'=>'required|string|max:255',
            'ras'=> 'required|string|max:255',
            'tanggal_lahir'=> 'required|date',
            'nama_pemilik'=> 'required|string|max:255',
            'kontak_pemilik'=> 'required|string|max:255',
            'status'=> 'required|in:aktif,tidak aktif'
           
        ]);
        $pets = Pet::findOrFail($id);
        $pets->update($request->all());
    return redirect()->route('hewan.index')->with('success', 'Data Hewan Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pets = Pet::findOrFail($id);
        $pets->delete();
       return redirect()->route('hewan.index')->with('success', 'Data Hewan Berhasil dihapus');
    }
    public function trash()
    {
        $pets = Pet::onlyTrashed()->paginate(10); // hanya ambil data yang dihapus
        return view('hewan.trash', compact('pets'));
    }

    public function restore($id)
{
    $pets = Pet::onlyTrashed()->findOrFail($id);
    $pets->restore();
    return redirect()->route('hewan.trash')->with('success', 'Data berhasil dipulihkan.');
}

public function forceDelete($id)
{
    $pets = Pet::onlyTrashed()->findOrFail($id);
    $pets->forceDelete();
    return redirect()->route('hewan.trash')->with('success', 'Data berhasil dihapus permanen.');
}

}