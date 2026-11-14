<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataInventaris = Inventaris::all();
        //tampilkan data guru
        return view('inventaris.index', compact('dataInventaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventaris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'kode_barang' => 'required|unique:inventaris',
        'nama_barang' => 'required',
        'kondisi'     => 'required',
        'jumlah'      => 'required|integer',
    ]);

    Inventaris::create($request->all());

    return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Inventaris $inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventaris $inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id); 
        $inventaris->delete(); 
    
        return redirect()->route('inventaris.index') 
            ->with('success', 'Data inventaris berhasil dihapus.'); 
    }
}
