<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    function index()
    {
        $stocks =  Stock::all();
        return view('stock.stockGudang', ['stocks' => $stocks]);
    }

    function post(Request $request)
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

    function edit(string $id)
    {
        $stock = Stock::find($id);

        return view('stock.editStockGudang', ['stock' => $stock]);
    }
}
