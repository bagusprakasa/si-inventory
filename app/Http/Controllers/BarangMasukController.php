<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Exception;
use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\GuideDriver;

use App\Http\Requests\BarangMasukRequest;
use App\Models\DetailBarangMasuk;
use App\Models\StokProduk;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $guidedriver = GuideDriver::get();
        $data = BarangMasuk::with('guide_driver', 'supplier')->paginate(10);
        if ($request->key) {
            $data = BarangMasuk::with('guide_driver')->where('name', $request->key)->paginate(10);
        }
        return view('pages.barang_masuk.index', compact('data', 'guidedriver'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guidedriver = GuideDriver::get();
        $sup = Vendor::get();
        $countItem = is_array(old('barang')) ? count(old('barang')) : 1;
        $barang = Produk::get();
        return view('pages.barang_masuk.create', compact("guidedriver", 'countItem', 'barang', 'sup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangMasukRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $model = new BarangMasuk();
            $model->trx_no = 'INV/' . Carbon::now()->format('Y/m/d') . time();
            if ($request->vendor_guide_driver == 'supplier') {
                $model->vendor_id = $request->id_supplier;
            } else {
                $model->guidedriver_id = $request->id_guidedriver;
            }

            // $model->guidedriver_id = $validated['id_guidedriver'];
            $model->date_in = $validated['date_in'];
            $model->note = $request->note;
            $model->total_qty = $request->total_qty;
            $model->grand_total = $request->grand_total;
            $model->save();

            foreach ($request->get('barang') as $key => $value) {
                $detailPesananbarangmasuk = new DetailBarangMasuk();
                $detailPesananbarangmasuk->barang_masuk_id = $model->id;
                $detailPesananbarangmasuk->produk_id = $value;
                $detailPesananbarangmasuk->qty = $request->get('qty')[$key];
                $detailPesananbarangmasuk->subtotal = $request->get('subtotal')[$key];

                $detailPesananbarangmasuk->save();

                $stokOld = StokProduk::where('produk_id', $value)->first();
                $stokModel = StokProduk::where('produk_id', $value)->first();
                $stokModel->stok = $stokOld->stok + $request->get('qty')[$key];
                $stokModel->save();
            }
        } catch (Exception $e) {
            DB::rollback();
            // return back()->withError('Terjadi kesalahan.');
            return $e;
        } catch (QueryException $e) {
            DB::rollback();
            return $e;
            // return back()->withError('Terjadi kesalahan pada database.');
        }
        DB::commit();

        return redirect()->route('barang-masuk.index')->withStatus('Data berhasil disimpan.');





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
        return DetailBarangMasuk::with('produk')->where('barang_masuk_id', $barangMasuk->id)->get();
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
        $no = $request->no + 1;
        $barangs = Produk::get();
        return view('pages.barang_masuk.tr', compact('i', 'no', 'barangs'));
    }
}
