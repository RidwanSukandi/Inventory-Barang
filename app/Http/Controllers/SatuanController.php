<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan =  Satuan::all();

        return view('satuan.satuan', ['satuan' => $satuan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.add-satuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'satuan_barang' => 'required|unique:satuan|max:100'
        ]);

        if ($validator->fails()) {
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $satuan = new Satuan($validated);

        $satuan->save();

        return redirect('/satuan')->with('suceess', 'berhasil menambahkan data');
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
        $satuan =  Satuan::find($id);
        return view('satuan.edit-satuan', ['satuan' => $satuan]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'satuan_barang' => 'required|unique:satuan|max:100'
        ]);

        if ($validator->fails()) {
            redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        $satuan = Satuan::find($id);

        $satuan->satuan_barang = $validated['satuan_barang'];

        $satuan->update();

        return redirect('/satuan')->with('suceess', 'berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuan = Satuan::find($id);

        if ($satuan) {
            $satuan->delete();
            return response()->json(['message' => 'Data Satuan berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Data Satuan tidak ditemukan'], 404);
        }
    }
}
