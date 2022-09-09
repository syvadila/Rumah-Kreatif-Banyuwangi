<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\design;
use App\Models\jadwal_konsultasi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('role','asosiasi')->count();
        $design = design::count();
        $kunjungan_konsultasi = jadwal_konsultasi::count();
        return view('admin.dashboard',compact('user','design','kunjungan_konsultasi'));
    }
}
