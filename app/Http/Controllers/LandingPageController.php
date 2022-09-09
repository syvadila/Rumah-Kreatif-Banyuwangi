<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\katalog;
use App\Models\asosiasi;
use Carbon\Carbon;

class LandingPageController extends Controller
{
    public function beranda()
    {
        return view('page.beranda');
    }

    public function asosiasi()
    {
        $asosiasis = asosiasi::orderBy('id','DESC')->get();
        return view('page.asosiasi',compact('asosiasis'));
    }

    public function jasa()
    {
        return view('page.jasa');
    }

    public function katalog(Request $request)
    {
        $katalogs = katalog::orderBy('id','DESC')->get();
        if($request->daterange){
            $tg = explode(' - ',$request->daterange);
            $tg_a = explode('/',$tg[0]);
            $tg_b = explode('/',$tg[1]);
            $tg_awal = new Carbon($tg_a[2].'-'.$tg_a[0].'-'.$tg_a[1]);
            $tg_akhir = new Carbon($tg_b[2].'-'.$tg_b[0].'-'.$tg_b[1]);
            $katalogs = katalog::whereBetween('tanggal_awal',[$tg_awal,$tg_akhir])
            ->orWhereBetween('tanggal_akhir',[$tg_awal,$tg_akhir])
            ->get();
        }

        return view('page.katalog', compact('katalogs'));
    }
}
