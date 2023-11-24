<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisBarangs = JenisBarang::all();
        return view('jenis-barang.jenis-barang', ['jenisBarangs' => $jenisBarangs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-barang.add-jenis-barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_barang' => 'required|unique:jenis_barangs'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated =   $validator->validated();

        $jenisBarang = new JenisBarang($validated);

        $jenisBarang->save();

        return redirect('/jenis-barang')->with('suceess', 'berhasil menambahkan data');
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
        $items = JenisBarang::where('id', $id)->get();

        return view('jenis-barang.edit-jenis-barang', ['jenis_barang' => $items]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'jenis_barang' => 'required|unique:jenis_barangs'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated =   $validator->validated();

        $jenisBarang = JenisBarang::find($id);

        $jenisBarang->jenis_barang = $validated['jenis_barang'];

        $jenisBarang->update();

        return redirect('/jenis-barang')->with('suceess', 'berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisBarang = JenisBarang::find($id);

        if ($jenisBarang) {
            $jenisBarang->delete();
            return response()->json(['message' => 'Data Jenis Barang berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Data Jenis Barang tidak ditemukan'], 404);
        }
    }
}
