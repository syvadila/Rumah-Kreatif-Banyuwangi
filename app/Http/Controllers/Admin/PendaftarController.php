<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pendaftar_asosiasi;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = pendaftar_asosiasi::where('status','pending')->get();
        return view('admin.pendaftar',compact('pendaftars'));
    }

    public function verifikasi($id)
    {
        $pendaftar = pendaftar_asosiasi::find($id);
        $password = Str::random(6);
        $details = [
            'nama' => $pendaftar->name,
            'email' => $pendaftar->email,
            'password' => $password,
            'status'=>"diverifikasi"
        ];

        User::create([
            'name' => $pendaftar->name,
            'email' => $pendaftar->email,
            'nik'=>$pendaftar->nik,
            'id_card'=>$this->generateIdCard(),
            'alamat'=>$pendaftar->alamat,
            'alamat_produksi'=>$pendaftar->alamat_produksi,
            "nama_umkm"=>$pendaftar->nama_umkm,
            "kategori"=>$pendaftar->kategori,
            "nib"=>$pendaftar->nib,
            'password' => bcrypt($password),
            'role' => 'asosiasi',
        ]);

        $pendaftar->update([
            'status' => "diverifikasi"
        ]);


        Mail::to($pendaftar->email)->send(new MailSend($details));
        return redirect()->back()->with('sukses', 'Berhasil DiVerifikasi');
    }

    public function tolakverifikasi($id)
    {
        $pendaftar = pendaftar_asosiasi::find($id);
        $details = [
            'nama' => $pendaftar->name,
            'email' => $pendaftar->email,
            'status'=>"ditolak"
        ];
        $pendaftar->update([
            'status' => "ditolak"
        ]);

        Mail::to($pendaftar->email)->send(new MailSend($details));
        return redirect()->back()->with('gagal', 'Verifikasi Akun Ditolak');
    }

    public function generateIdCard()
    {
        do {
            $code = "RK". random_int(111111, 999999);
        } while (User::where("id_card", "=", $code)->first());
  
        return $code;
    }
}
