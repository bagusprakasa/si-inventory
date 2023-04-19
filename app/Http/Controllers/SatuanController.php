<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSatuan;
use App\Models\Satuan;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Satuan::paginate(10);
        if ($request->key) {
            $data = Satuan::where('name', $request->key)->paginate(10);
        }
        return view('pages.satuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestSatuan $request)
    {
        $request = $request->validated();
        try {
            $model = new Satuan;
            $model->name = $request['name'];
            $model->save();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('satuan.index')->withStatus('Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        $data = $satuan;
        return view('pages.satuan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestSatuan $request, Satuan $satuan)
    {
        $request = $request->validated();
        try {
            $model = $satuan;
            $model->name = $request['name'];
            $model->save();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('satuan.index')->withStatus('Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        try {
            $satuan->delete();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('satuan.index')->withStatus('Data berhasil dihapus.');
    }
}
