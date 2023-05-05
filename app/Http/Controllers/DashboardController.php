<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $masuk = BarangMasuk::get();
        $arrMasukDate = [];
        $arrMasukQty = [];
        foreach ($masuk as $key => $value) {
            array_push($arrMasukDate, \Carbon\Carbon::parse($value->date_in)->format('F'));
            array_push($arrMasukQty, $value->total_qty);
        }
        // return $arrMasuk;
        // setlocale(LC_TIME, 'id_ID');
        // \Carbon\Carbon::setLocale('id');
        // return \Carbon\Carbon::parse($masuk->date_in)->format('F');
        return view('pages.dashboard', compact('arrMasukQty', 'arrMasukDate'));
    }
}
