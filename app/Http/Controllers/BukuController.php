<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $list_buku = Buku::where([
            ['judul', '!=', null,'OR','penulis', '!=', null, 'OR', 'kategory', '!=', null],
            [function ($query) use ($request) {
                if (($keyword = $request->keyword)) {
                    $query->orWhere('judul', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('penulis', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('kategory', 'LIKE', '%' . $keyword . '%')->get();
                }
            }]
        ])
            ->orderBy('id_buku', 'desc')
            ->paginate(5);

        return view('buku.index', compact('list_buku'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');
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
            'penulis' => 'required',
            'kategory' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {
        $buku = Buku::find($id_buku);
        $next = Buku::where('id_buku', '<', $id_buku)->orderBy('id_buku', 'desc')->first();
        $prev = Buku::where('id_buku', '>', $id_buku)->orderBy('id_buku')->first();
        return view('buku.show', compact('buku', 'next', 'prev'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_buku)
    {
        $buku = Buku::find($id_buku);
        return view('buku.edit', compact('bukus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {
        $request->validate([
            'penulis' => 'required',
            'kategory' => 'required',
            'penerbit' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        Barang::find($id_buku)->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        Buku::find($id_buku)->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}