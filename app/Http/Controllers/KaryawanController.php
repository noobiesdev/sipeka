<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_karyawan = \App\Karyawan::all();
        return view('karyawan',['data_karyawan' => $data_karyawan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'nama_lengkap' => 'required',
          'username' => 'required',
          'email' => 'required',
        ]);
        //insert ke tabel users
        $user = new \App\User;
        $user->role = 'kasir';
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();

        //insert ke tabel karyawan
        $request->request->add(['user_id' => $user->id]);
        $karyawan = \App\Karyawan::create($request->all());
        return redirect('/karyawan')->with('status','Data Karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
      $request->validate([
        'nama_lengkap' => 'required',
        'username' => 'required',
        'email' => 'required',
      ]);
        $karyawan = \App\Karyawan::find($id);
        $karyawan->update($request->all());

        $user = \App\User::find($karyawan->user_id);
        // $user->name = $request->username;
        // $user->email = $request->email;
        $user->update([
          'name' =>$request->username,
          'email' =>$request->email
        ]);
        return redirect('/karyawan')->with('status','Data Karyawan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = \App\Karyawan::find($id);
        $karyawan->delete();
        $user = \App\User::find($karyawan->user_id);
        $user->delete();

        return redirect('/karyawan')->with('status', 'Data Berhasil Dihapus!');
    }
}
