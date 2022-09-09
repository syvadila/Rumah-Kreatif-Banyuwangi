<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\asosiasi;

class AsosiasiController extends Controller
{
    public function index()
    {
        $asosiasis = asosiasi::orderBy('id','DESC')->get();
        return view('admin.asosiasi',compact('asosiasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_asosiasi' => 'required',
            'deskripsi' => 'required',
        ]);

        $file = $request->file('foto_asosiasi');

        $tujuan_upload = public_path('/asosiasi');
        $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
 
        $file->move($tujuan_upload,$nama_file);
        $asosiasi = $request->all();
        $asosiasi["foto_asosiasi"] = $nama_file;


        asosiasi::create($asosiasi);
        return redirect()->back()->with('sukses', 'Asosiasi berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_asosiasi' => 'required',
            'deskripsi' => 'required',
        ]);
        asosiasi::find($id)->update($request->all());
        return redirect()->back()->with('sukses', 'Asosiasi berhasil diubah');
    }

    public function destroy($id)
    {
        asosiasi::find($id)->delete();
        return redirect()->back()->with('sukses', 'Asosiasi berhasil dihapus');
    }
}
