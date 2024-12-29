<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dd($request->all());
        $request->validate(
            [
              'userID' => 'required|max:45',
              'username' => 'required|max:45',
              'role' => 'required|max:45',
              'email' => 'required|email',
              'password' => 'required|max:45',
              'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
              'username.required' => 'username wajib diisi',
              'username.max' => 'username maksimal 45 karakter',
              'email.required' => 'Email wajib diisi',
              'password.required' => 'Password wajib diisi',
              'foto.max' => 'Foto maksimal 2 MB',
              'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
              'foto.image' => 'File harus berbentuk image'
            ]
          );

          //jika file foto ada yang terupload
          if (!empty($request->foto)) {
            //maka proses berikut yang dijalankan
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('image'), $fileName);
          } else {
            $fileName = 'nophoto.jpg';
          }

          //tambah data produk
          DB::table('users')->insert([
            'userID' => $request->userID,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'password' => $request->password,
            'picture' => $fileName,
          ]);

          return redirect()->route('index.index');
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
    public function edit(User $id)
    {
        //
        return view('user.edit', compact('id'));
  }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate(
            [
              'userID' => 'required|max:45',
              'username' => 'required|max:45',
              'role' => 'required|max:45',
              'email' => 'required|email',
              'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
              'username.required' => 'username wajib diisi',
              'username.max' => 'username maksimal 45 karakter',
              'email.required' => 'Email wajib diisi',
              'foto.max' => 'Foto maksimal 2 MB',
              'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
              'foto.image' => 'File harus berbentuk image'
            ]
          );


          //foto lama
          $fotoLama = DB::table('users')->select('picture')->where('id', $id)->get();
          foreach ($fotoLama as $f1) {
            $fotoLama = $f1->picture;
          }

          //jika foto sudah ada yang terupload
          if (!empty($request->foto)) {
            //maka proses selanjutnya
            if (!empty($fotoLama->foto))
              unlink(public_path('image' . $fotoLama->foto));
            //proses ganti foto
            $fileName = 'foto-' . $request->id . '.' . $request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('image'), $fileName);
          } else {
            $fileName = $fotoLama;
          }

          //update data produk
          DB::table('users')->where('id', $id)->update([
            'userID' => $request->userID,
            'username' => $request->username,
            'role' => $request->role,
            'email' => $request->email,
            'picture' => $fileName,
          ]);

          return redirect()->route('index.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        //
        $id->delete();

    return redirect()->route('index.index')
      ->with('success', 'Data berhasil di hapus');
    }
}
