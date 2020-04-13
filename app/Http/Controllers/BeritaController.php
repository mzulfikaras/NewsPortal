<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Kategori;
use Session;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::orderBy('created_at','DESC')
                ->paginate(10);
        return view('admin.page_admin',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Kategori::all();
        return view('admin.tambah_berita',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $org = $file->getClientOriginalName();
        $path = 'foto';
        $file->move($path,$org);

        $Berita = new Berita;
        $Berita->kategori_id = $request->kategori;
        $Berita->judul = $request->judul;
        $Berita->author = $request->author;
        $Berita->tanggal = date('Y-m-d');
        $Berita->isi = $request->isi;
        $Berita->foto = $org;
        $Berita->top_news = 'tidak aktif';
        $Berita->status = 'aktif' ;
        $Berita->save();
        if ($Berita) {
            Session::flash('success','Success Tambah Data');
            return redirect()->route('admin.berita');
        } else {
            Session::flash('success','Failed Tambah Data');
            return redirect()->route('admin.berita');
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
        $data = Berita::find($id);
        return view('admin.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::all();
        $berita = Berita::find($id);
        return view('admin.edit_berita',compact('data','berita'));
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
        $foto = $request->file('foto');
        if ($foto == "") {
            $Berita = Berita::find($id);
            $Berita->kategori_id = $request->kategori;
            $Berita->judul = $request->judul;
            $Berita->author = $request->author;
            $Berita->isi = $request->isi;
            $Berita->top_news =  $request->news;
            $Berita->status =  $request->status;
            $Berita->save();

           if ($Berita) {
                Session::flash('success','Success Ubah Data');
                return redirect()->route('admin.berita');
            } else {
                Session::flash('success','Failed Ubah Data');
                return redirect()->route('admin.berita');
            }
        } else {
            $file = $request->file('foto');
            $org = $file->getClientOriginalName();
            $path = 'foto';
            $file->move($path,$org);

            $BeritaModel = Berita::find($id) ;
            $BeritaModel->kategori_id = $request->kategori;
            $BeritaModel->judul = $request->judul;
            $BeritaModel->author = $request->author;
            $BeritaModel->isi = $request->isi;
            $BeritaModel->foto = $org;
            $BeritaModel->top_news =  $request->news;
            $BeritaModel->status =  $request->status;
            $BeritaModel->save();
            if ($BeritaModel) {
                Session::flash('success','Success Ubah Data');
                return redirect()->route('admin.berita');
            } else {
                Session::flash('success','Failed Ubah Data');
                return redirect()->route('admin.berita');
            }
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
        $Berita = Berita::find($id);
        $Berita->delete();
         if ($Berita) {
            Session::flash('success','Success Hapus Data');
            return redirect()->route('admin.berita');
        } else {
            Session::flash('success','Failed Hapus Data');
            return redirect()->route('admin.berita');
        }

    }
}
