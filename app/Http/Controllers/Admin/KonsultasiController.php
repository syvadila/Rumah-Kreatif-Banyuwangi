<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jadwal_konsultasi;

class KonsultasiController extends Controller
{
    public function index()
    {
        $jadwal_konsultasis = jadwal_konsultasi::
        join('users','users.id','jadwal_konsultasis.user_id')
        ->select('jadwal_konsultasis.*','users.name')
        ->get();
        return view('admin.konsultasi',compact('jadwal_konsultasis'));
    }
}
