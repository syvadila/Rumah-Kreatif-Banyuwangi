<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\design;
use App\Models\revisi_design;

class DesignController extends Controller
{
    public function index() {
        $designs = design::whereIn('status',['pending', 'rilis', 'revisi','selesai'])
        ->join('users','users.id','designs.user_id')
        ->select('designs.*','users.name')      
        ->orderBy('designs.status','ASC')  
        ->get();
        return view('admin.design',compact('designs'));
    }

    public function show($id)
    {
        $design =  design::with("revisi")->find($id);
        if($design->status != "pending"){
            return view('admin.revisi_design',compact('design'));
        }
        return view('admin.tangani_design',compact('design'));
    }

    public function update($id,Request $request)
    {
        $file = $request->file('foto');

        $tujuan_upload = public_path('/design/revisi');
        $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
 
        $file->move($tujuan_upload,$nama_file);
        $design = [
            'foto_hasil'=>$nama_file,
            'design_id' => $id
        ];

        revisi_design::create($design);
        design::find($id)->update(["status"=>"rilis"]);
        return redirect("design")->with('sukses','Berhasil mengunggah design');
    }
}
