<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks =  Stock::all();
        return view('stock.stockGudang', ['stocks' => $stocks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_barang = JenisBarang::all();
        $satuan = Satuan::all();

        return view('stock.addStockGudang', [
            'jenis_barang' => $jenis_barang,
            'satuan' => $satuan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|max:7',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'satuan' => 'required',
        ]);

        if ($validator->fails()) {
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $stock = new Stock($validated);
        $stock->kode_barang = 'BAR-' . $validated['kode_barang'];
        $stock->save();

        return redirect('/stock')->with('success', 'Data Berhasil Disimpan');
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
        $stock = Stock::find($id);

        if (!$stock) {

            return  redirect()->back();
        }

        $stock->kode_barang = substr($stock->kode_barang, 4);
        return view('stock.updateStockGudang', ['stock' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|max:7',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'jumlah_barang' => 'required',
            'satuan' => 'required',
        ]);

        if ($validator->fails()) {
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $stock = Stock::find($id);

        $stock->kode_barang = 'BAR-' . $validated['kode_barang'];
        $stock->nama_barang = $validated['nama_barang'];
        $stock->jenis_barang = $validated['jenis_barang'];
        $stock->jumlah_barang = $validated['jumlah_barang'];
        $stock->satuan = $validated['satuan'];

        $stock->update();

        return redirect('/stock')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::find($id);

        if ($stock) {
            $stock->delete();
            return response()->json(['message' => 'Data Stock Gudang berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Data Stock Gudang tidak ditemukan'], 404);
        }
    }
}
