<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideDriverRequest;
use App\Models\GuideDriver;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GuideDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = GuideDriver::paginate(10);
        if ($request->key) {
            $data = GuideDriver::where('name', $request->key)->paginate(10);
        }
        return view('pages.guide-driver.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.guide-driver.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuideDriverRequest $request)
    {
        $request = $request->validated();
        try {
            $model = new GuideDriver();
            $model->name = $request['name'];
            $model->type = $request['type'];
            $model->save();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('guide-driver.index')->withStatus('Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GuideDriver $guideDriver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuideDriver $guideDriver)
    {
        $data = $guideDriver;
        return view('pages.guide-driver.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuideDriverRequest $request, GuideDriver $guideDriver)
    {
        $request = $request->validated();
        try {
            $model = $guideDriver;
            $model->name = $request['name'];
            $model->type = $request['type'];
            $model->save();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.' .$e);
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.'.$e);
        }

        return redirect()->route('guide-driver.index')->withStatus('Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuideDriver $guideDriver)
    {
        try {
            $guideDriver->delete();
        } catch (Exception $e) {
            return back()->withError('Terjadi kesalahan.');
        } catch (QueryException $e) {
            return back()->withError('Terjadi kesalahan pada database.');
        }

        return redirect()->route('guide-driver.index')->withStatus('Data berhasil dihapus.');
    }
}
