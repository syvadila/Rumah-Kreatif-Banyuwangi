<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\design;
use App\Models\revisi_design;
use Response;

class DesignController extends Controller
{
    public function index() {
        $pesanan_design = design::where('user_id',auth()->user()->id)
        ->whereIn('status',['pending','rilis','revisi'])
        ->with("revisi")
        ->first();

        $design_saya= design::where('user_id',auth()->user()->id)
        ->where('status','selesai')
        ->with("revisi")
        ->get();
        return view('user.design',compact('pesanan_design','design_saya'));
    }

    public function pesandesign(Request $request)
    {
        // pending, rilis, revisi, selesai

        $file = $request->file('foto');

        $tujuan_upload = public_path('/design/contoh');
        $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
 
        $file->move($tujuan_upload,$nama_file);
        $design = [
            'nama_design'=>$request->nama_design,
            'jenis_design'=>$request->jenis_design,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$nama_file,
            'user_id' => auth()->user()->id
        ];

        design::create($design);
        return redirect()->back()->with('sukses','Berhasil memesan design');

    }

    public function revisidesign($id,Request $request)
    {
        $design = design::with("revisi")->find($id);
        if($request->hasFile('foto_revisi')){
            $file = $request->file('foto_revisi');

            $tujuan_upload = public_path('/design/revisi');
            $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
    
            $file->move($tujuan_upload,$nama_file);
            $design->revisi->last()->update(["foto_revisi"=>$nama_file]);
        }

        $design->revisi->last()->update(["deskripsi_revisi"=>$request->deskripsi_revisi]);
        $design->update(["status"=>"revisi"]);
        return redirect()->back()->with('sukses','Berhasil mengunggah revisi design');

    }

    public function design_selesai($id)
    {
        design::find($id)->update([
            "status"=>"selesai"
        ]);
        return redirect()->back()->with('sukses-selesai','Berhasil, Design telah selesai');
        
    }

    public function download_design($id)
    {
        $design = revisi_design::find($id)->foto_hasil;
        $filepath = public_path('/design/revisi/').$design;
        return Response::download($filepath);

    }
}
