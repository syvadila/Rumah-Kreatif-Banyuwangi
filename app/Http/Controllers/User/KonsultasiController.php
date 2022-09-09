<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\jadwal_konsultasi;
use \Carbon\Carbon;

class KonsultasiController extends Controller
{
    public function index()
    {
        $jadwal_konsultasi = jadwal_konsultasi::where('user_id',auth()->user()->id)
        ->whereDate('tanggal', '>=', Carbon::now()->format('Y-m-d'))
        ->latest()->first();
        return view('user.konsultasi',compact('jadwal_konsultasi'));
    }

    public function kirimjadwal(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'konsultasi' => 'required',
        ]);
        // dd($request);
        jadwal_konsultasi::create([
            'tanggal' => $request->tanggal,
            'konsultasi' => $request->konsultasi,
            'user_id'=> auth()->user()->id
        ]);
        return redirect()->back()->with('sukses', 'Jadwal konsultasi berhasil dikirim');
    }

    public function cekjadwal(Request $request)
    {
        $tanggal_sekarang = Carbon::now();
        $date = new Carbon($request->tanggal);
        $hari = $date->isoFormat('dddd');

        $jadwal = jadwal_konsultasi::where('tanggal', $request->tanggal)->count();

        if ($jadwal >= 5 || $hari == 'Sabtu' || $hari == 'Minggu' || $request->tanggal < $tanggal_sekarang) {
            return response()->json(['status' => 'penuh']);
        } else {
            return response()->json(['status' => 'tersedia']);
        }
    }
}
