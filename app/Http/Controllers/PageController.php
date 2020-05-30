<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use App\Tentang;
use App\Komentar;
use Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semua = Berita::orderBy('created_at','DESC')
        ->where('status','aktif')
        ->take(4)
        ->get();
$ekonomi =  Berita::orderBy('created_at','DESC')
            ->where('kategori_id',4)
            ->where('status','aktif')
            ->take(4)
            ->get();
$olahraga =  Berita::orderBy('created_at','DESC')
            ->where('kategori_id',5)
            ->where('status','aktif')
            ->take(4)
            ->get();
$politik =  Berita::orderBy('created_at','DESC')
            ->where('kategori_id',6)
            ->where('status','aktif')
            ->take(4)
            ->get();
$tekno =  Berita::orderBy('created_at','DESC')
            ->where('kategori_id',7)
            ->where('status','aktif')
            ->take(4)
            ->get();
$tops =  Berita::orderBy('created_at','DESC')
            ->where('status','aktif')
            ->where('top_news','aktif')
            ->take(8)
            ->get();
            $about = Tentang::find(1);
return view('content.isi',compact('semua','ekonomi','olahraga','politik','tekno','tops','about')) ;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = Tentang::find(1);
        $news = Berita::find($id);
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
        $komen = Komentar::orderBy('created_at','DESC')
                ->where('id',$id)
                ->where('status','aktif')
                ->get();
        return view('content.detail',compact('about','news','semua','komen'));
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
        $komen = new Komentar;
        $komen->nama = $request->nama;
        $komen->email = $request->email;
        $komen->keterangan = $request->isi;
        $komen->tanggal = date('Y-m-d');
        $komen->status = 'aktif';
        $komen->id = $id;
        $komen->save();

        if ($komen) {
            Session::flash('success','Komentar berhasil ditambahkan');
            return redirect()->back();
        } else {
            Session::flash('success','Komentar gagal ditambahkan');
            return redirect()->back();
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

    public function list($id)
    {
        $about = Tentang::find(1);
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
        $ekonomi =  Berita::orderBy('created_at','DESC')
                    ->where('kategori_id',$id)
                    ->where('status','aktif')
                    ->get();
        return view('content.list',compact('about','semua','ekonomi')) ;
    }
    public function cari(Request $request)
    {
        $key = $request->get('cari');
        $ekonomi = Berita::where('judul','LIKE','%'.$key.'%')->get();
        $about = Tentang::find(1);
        $semua = Berita::orderBy('created_at','DESC')
                ->where('status','aktif')
                ->take(6)
                ->get();
        return view('content.list',compact('about','ekonomi','semua')) ;
    }
}
