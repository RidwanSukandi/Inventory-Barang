<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Satuan;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\isEmpty;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        return view('barang-masuk.barang-masuk', ['barang_masuk' => $barang_masuk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuan = Satuan::all();
        $stock = Stock::all();

        return view('barang-masuk.add-barang-masuk', ['stock' => $stock, 'satuan' => $satuan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_masuk' => 'required|date',
            'nama_barang' => 'required|max:100',
            'pengirim' => 'required|max:100',
            'jumlah_masuk' => 'required',
            'satuan' => 'required'
        ]);

        $validated =  $validator->validated();

        $stock = Stock::where('nama_barang', $validated['nama_barang'])->first();

        $barang_masuk = new BarangMasuk($validated);

        $barang_masuk->id_transaksi  = "TRM-" . str_replace("-", "", $validated['tanggal_masuk'] . $validated['jumlah_masuk']);

        $barang_masuk->kode_barang = $stock->kode_barang;
        $barang_masuk->satuan = $stock->satuan;
        $stock->jumlah_barang += $validated['jumlah_masuk'];

        $barang_masuk->save();
        $stock->save();

        return redirect('/barang-masuk')->with('suceess', 'berhasil menambahkan data');
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
        $barangMasuk = BarangMasuk::find($id);

        $stock = Stock::where('nama_barang', $barangMasuk->nama_barang)->first();

        $data = $stock->jumlah_barang - $barangMasuk->jumlah_masuk;

        if ($barangMasuk) {
            $stock->jumlah_barang = $data;
            $stock->save();
            $barangMasuk->delete();
            return response()->json(['message' => 'Data Jenis Barang berhasil dihapus', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'Data Jenis Barang tidak ditemukan'], 404);
        }
    }
}
