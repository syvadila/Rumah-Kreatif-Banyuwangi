<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function store(Request $request)
    {
       $request->validate([
           'name'=>'required',
           'email'=>'required',
       ]);

       $data = [
           "name"=>$request->name,
           "email"=>$request->email,
           "alamat"=>$request->alamat,
       ];

       if($request->password != null){
            $data["password"] = bcrypt($request->password);
       }
       if($request->has("foto")){
        $file = $request->file('foto');

        $tujuan_upload = public_path('/image/profil');
        $nama_file = date('d-m-Y-H-i').$file->getClientOriginalName();
 
        $file->move($tujuan_upload,$nama_file);
        $data["foto"] = $nama_file;
       }


       User::find(auth()->user()->id)->update($data);
       return redirect()->back()->with("sukses","Profil Berhasil diubah");
    }
}
