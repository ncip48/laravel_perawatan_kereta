<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori_sparepart;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //join table kategori_sparepart dan sparepart
        $spareparts = Sparepart::select('sparepart.*', 'kategori_sparepart.nama_kategori')
        ->join('kategori_sparepart', 'sparepart.id_kategori_sparepart', '=', 'kategori_sparepart.id')
        ->get();

        $active = 'master_sparepart';
        return view('master_sparepart.sparepart.show', compact('spareparts', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $active = 'master_sparepart';
        $spareparts = Sparepart::all();
        $kategori_spareparts = Kategori_sparepart::all();

        return view('master_sparepart.sparepart.add',compact('spareparts','kategori_spareparts','active'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //join table kategori_sparepart dan sparepart
        
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
