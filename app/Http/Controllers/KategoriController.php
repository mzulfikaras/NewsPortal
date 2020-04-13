<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori',compact('data'));
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
        $Kategori = new Kategori;
        $Kategori->nama = $request->nama;
        $Kategori->keterangan = $request->ket;
        $Kategori->status = 'aktif';
        $Kategori->tanggal = date('Y-m-d');
        $Kategori->save();
        if ($Kategori) {
            Session::flash('success','Success Tambah Data');
            return redirect()->route('admin.kategori');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('admin.kategori');
        }
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
        $data = Kategori::find($id);
        return view('admin.edit_kategori',compact('data'));
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
        $Kategori = Kategori::find($id);
        $Kategori->nama = $request->nama;
        $Kategori->keterangan = $request->ket;
        $Kategori->status = $request->status;
        $Kategori->save();
        if ($Kategori) {
            Session::flash('success','Success Tambah Data');
            return redirect()->route('admin.kategori');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('admin.kategori');
        }
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
