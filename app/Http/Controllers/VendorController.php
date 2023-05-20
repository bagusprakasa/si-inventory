<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Vendor::paginate(10);
        if ($request->key) {
            $data = Vendor::where('name', $request->key)->paginate(10);
        }
        return view('pages.vendor.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        $validate = $request->validated();
        try {
            $model = new Vendor;
            $model->nama = $validate['name'];
            $model->save();
        } catch (Exception $e) {
            return $e;
            // return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return $e;
            // return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('supplier.index')->withStatus('Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
