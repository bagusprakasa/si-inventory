<?php

namespace App\Http\Controllers;
use App\Models\BarangMasuk;
use Exception;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\GuideDriver;

use App\Http\Requests\BarangMasukRequest;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $guidedriver = GuideDriver::get();
        $data = BarangMasuk::paginate(10);
        if ($request->key) {
            $data = BarangMasuk::where('name', $request->key)->paginate(10);
        }
        return view('pages.barang_masuk.index', compact('data','guidedriver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guidedriver = GuideDriver::get();
        $countItem = is_array(old('barang')) ? count(old('barang')) : 1;
        $barang = Produk::get();
        return view('pages.barang_masuk.create', compact("guidedriver", 'countItem', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangMasukRequest $request)
    {

        $request = $request->validated();
        try {
            $model = new BarangMasuk();
            $model->guidedriver_id = $request['id_guidedriver'];
            $model->save();
        } catch (Exception $e) {
            // return back()->withError('Terjadi kesalahan.');
            return $e;
        } catch (QueryException $e) {
            return $e;
            // return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('barang_masuk.index')->withStatus('Data berhasil disimpan.');





        // $request = $request->validated();
        // try {
        //     $model = new BarangMasuk();
        //     $model->guidedrive_id = $request['id_guidedriver'];
        //     $model->kategori_id = $request['id_kategori'];
        //     $model->name = $request['name'];
        //     $model->save();
        // } catch (Exception $e) {
        //     // return back()->withError('Terjadi kesalahan.');
        //     return $e;
        // } catch (QueryException $e) {
        //     return $e;
        //     // return back()->withError('Terjadi kesalahan pada database.');
        // }

        // return redirect()->route('barang-masuk.index')->withStatus('Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        //
    }
    public function ajaxSelect(Request $request)
    {
        $i = $request->no;
        $no = $request->no+1;
        $barangs = Produk::get();
        return view('pages.barang_masuk.tr', compact('i','no','barangs'));
    }
}
