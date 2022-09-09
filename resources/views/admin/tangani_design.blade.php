@extends('template.master')
@section('css')
<style>
    .dashed {
        border-style: dashed;
        padding: 10px;
        border-width: 1px;
    }
</style>
@endsection
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Design Baru</h6>
    </div>
    <div class="card-body">
        <div class="row dashed">
            <div class="col-md-6 border-right">
                <div class="row">
                    <div class="col">Nama Design </div>
                    <div class="col-9">: {{$design->nama_design}}</div>
                </div>
                <div class="row">
                    <div class="col">Jenis Design </div>
                    <div class="col-9">: {{$design->jenis_design}}</div>
                </div>
                <div class="row">
                    <div class="col">Deskripsi </div>
                    <div class="col-9">: {{$design->deskripsi}}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mx-auto">
                    <h6>Contoh Design</h6>
                    <img class="mx-auto d-block" src="{{asset('public/design/contoh/'.$design->foto)}}" alt=""
                        width="150px;">

                </div>
            </div>
        </div>

    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Unggah Design</h6>
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <input type="file" id="fotoInput" name="foto" class="form-control" hidden accept="image/*" onchange="readURL(this)" required>
            <div class="dashed py-3 mb-4">
                <img src="" alt="" id="blah" class="mx-auto d-block mb-3">

                <button type="button" class="btn btn-success mx-auto d-block" 
                onClick="document.getElementById('fotoInput').click();">
                    <i class="fa fa-upload"></i>
                </button>
            </div>

            <button  type="submit" class="btn btn-primary mx-auto d-block">Unggah</button>
        </form>

    </div>
</div>

@endsection

@section('js')

<script>


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result).width(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection