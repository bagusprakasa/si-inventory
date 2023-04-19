<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriProdukRequest;
use App\Models\KategoriProduk;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = KategoriProduk::paginate(10);
        if ($request->key) {
            $data = KategoriProduk::where('name', $request->key)->paginate(10);
        }
        return view('pages.kategori_produk.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori_produk.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriProdukRequest $request)
    {
        $request = $request->validated();
        try {
            $model = new KategoriProduk();
            $model->name = $request['name'];
            $model->save();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('kategori_produk.index')->withStatus('Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriProduk $kategoriProduk)
    {
        $data = $kategoriProduk;
        return view('pages.kategori_produk.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriProduk $kategoriProduk)
    {
        $request = $request->validated();
        try {
            $model = $kategoriProduk;
            $model->name = $request['name'];
            $model->save();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('kategori_produk.index')->withStatus('Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        try {
            $kategoriProduk->delete();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('kategori_produk.index')->withStatus('Data berhasil dihapus.');
    }
}
