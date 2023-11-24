<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_keluar = BarangKeluar::all();

        return view('barang-keluar.barang-keluar', ['barang_keluar' => $barang_keluar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stock = Stock::all();
        return view('barang-keluar.add-barang-keluar', [
            'stock' => $stock
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_keluar' => 'required|date',
            'nama_barang' => 'required|max:100',
            'tujuan' => 'required|max:100',
            'jumlah_keluar' => 'required',
            'satuan' => 'required'
        ]);

        $validated =  $validator->validated();

        $stock = Stock::where('nama_barang', $validated['nama_barang'])->first();

        $barang_keluar = new BarangKeluar($validated);

        $barang_keluar->id_transaksi  = "TRK-" . str_replace("-", "", $validated['tanggal_keluar'] . $validated['jumlah_keluar']);

        $barang_keluar->kode_barang = $stock->kode_barang;
        $barang_keluar->satuan = $stock->satuan;
        $stock->jumlah_barang -= $validated['jumlah_keluar'];

        $barang_keluar->save();
        $stock->save();

        return redirect('/barang-keluar')->with('suceess', 'berhasil menambahkan data');
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
