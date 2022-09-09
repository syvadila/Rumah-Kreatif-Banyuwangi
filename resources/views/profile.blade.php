@extends('template.master')

@section('content')

<div class="card">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>

    </div>
    <div class="card-body">

        <form action="{{url('profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Nama</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="name" class="form-control"
                    value="{{auth()->user()->name}}"
                    >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Email</label>
                </div>
                <div class="col-md-9">
                    <input type="email" name="email" class="form-control"
                    value="{{auth()->user()->email}}"
                    >
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Password</label>
                </div>
                <div class="col-md-9">
                    <input type="password" placeholder="*****" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Alamat</label>
                </div>
                <div class="col-md-9">
                    <textarea name="alamat" class="form-control">{{auth()->user()->alamat}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <label for="">Foto Profil</label>
                </div>
                <div class="col-md-9">
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
            </div>

            <button class="btn btn-sm btn-primary float-right">Simpan</button>
        </form>

    </div>
</div>

@endsection