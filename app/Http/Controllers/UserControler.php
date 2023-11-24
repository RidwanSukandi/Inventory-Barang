<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserControler extends Controller
{
    public function index()
    {
        $user =  User::all();

        return view('dataPengguna', ['users' => $user]);
    }

    function post(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:users|max:4',
            'name' => 'required|unique:users|max:255',
            'telepon' => 'nullable',
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'nullable',
        ]);


        $validated = $validator->validated();

        $file = $request->file('foto');
        $name = $file->getClientOriginalName();
        $path = $file->move(public_path('images'), $name);

        $user = new User($validated);
        $user->foto = $name;
        $user->password = Hash::make($validated['password']);

        $user->save();

        return redirect('/data-pengguna')->with('success', 'user has been created');
    }

    function edit($id)
    {
        $datas = User::find($id);

        return response()->json($datas);
    }

    function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:users|max:4',
            'name' => 'required|unique:users|max:255',
            'telepon' => 'nullable',
            'username' => 'required|unique:users|max:255',
            'password' => 'required',
            'level' => 'required',
            'foto' => 'nullable',
        ]);


        $validated = $validator->validated();

        $file = $request->file('foto');
        $name = $file->getClientOriginalName();
        $path = $file->move(public_path('images'), $name);

        $user = User::find($id);
        $user->nik = $validated['nik'];
        $user->name = $validated['name'];
        $user->telepon = $validated['telepon'];
        $user->username = $validated['username'];
        $user->password = $validated['password'];
        $user->level = $validated['level'];
        $user->foto = $name;
        $user->update();

        return redirect('data-pengguna');
    }

    function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json(['message' => 'Data pengguna berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Data pengguna tidak ditemukan'], 404);
        }
    }
}
