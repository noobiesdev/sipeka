<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data_menu = \App\Menu::all();
      return view('menu',['data_menu' => $data_menu]);
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
        'nama_menu' => 'required',
        'harga' => 'required',
        'foto' => 'required',
        'deskripsi' => 'required',
      ]);
        //insert ke tabel Menu
        $produk = new \App\Menu;
        $produk->nama_menu = $request->input('nama_menu');
        $produk->harga = $request->input('harga');
        $produk->tipe = $request->input('tipe');
        $produk->ketersediaan = 'ada'; //nilai ketersediaan = ada atau habis
        $produk->deskripsi = $request->input('deskripsi');
        $request->request->add(['ketersediaan' => $produk->ketersediaan]);

        if ($request->hasfile('foto')) {
          $file = $request->file('foto');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename = time() . '.' . $extension;
          $file->move('uploads/menu/', $filename);
          $produk->foto = $filename;
        }else {
          return $request;
          $produk->foto = '';
        }
        $produk->save();
        return redirect('/menu')->with('status','Data Menu berhasil ditambahkan!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
