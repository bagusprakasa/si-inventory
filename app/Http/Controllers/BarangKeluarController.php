<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangKeluarRequest;
use App\Models\BarangKeluar;
use App\Models\GuideDriver;
use App\Models\Produk;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = BarangKeluar::paginate(10);
        if ($request->key) {
            $data = BarangKeluar::where('name', $request->key)->paginate(10);
        }
        return view('pages.barang_keluar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guidedriver = GuideDriver::get();
        $countItem = is_array(old('barang')) ? count(old('barang')) : 1;
        $barang = Produk::get();
        return view('pages.barang_keluar.create', compact("guidedriver", 'countItem', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = $request->validated();
        try {
            $model = new BarangKeluar();
            $model->guidedriver_id = $request['id_guidedriver'];
            $model->save();
        } catch (Exception $e) {
            // return back()->withError('Terjadi kesalahan.');
            return $e;
        } catch (QueryException $e) {
            return $e;
            // return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('barang_keluar.index')->withStatus('Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }

    public function ajaxSelect(Request $request)
    {
        $i = $request->no;
        $no = $request->no+1;
        $barangs = Produk::get();
        return view('pages.barang_keluar.tr', compact('i','no','barangs'));
    }
}
