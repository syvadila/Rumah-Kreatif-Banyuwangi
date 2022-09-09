@extends('template.master')
<style>
    .dashed {
        border-style: dashed;
        padding: 10px;
        border-width: 1px;
    }
</style>
@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Revisi Design</h6>
    </div>
    <div class="card-body">
        <div class="row dashed">
            <div class="col-md-6 border-right">

            <div class="mx-auto">
                    <h6>Design</h6>
                    <img class="mx-auto d-block" src="{{asset('public/design/revisi/'.$design->revisi->last()->foto_hasil)}}" alt=""
                        width="150px;">

                </div>
                   
            </div>
            <div class="col-md-6">
                <div class="mx-auto">
                    <h6>Revisi Design</h6>
                    @if($design->revisi->last()->foto_revisi != null)
                    <img class="mx-auto d-block" src="{{asset('public/design/revisi/'.$design->revisi->last()->foto_revisi)}}" alt=""
                        width="150px;">
                    @endif

                    <span class="mt-2">Revisi : {{ $design->revisi->last()->deskripsi_revisi }}</span>

                </div>
            </div>
        </div>

    </div>
</div>



<!-- DataTales Example -->
@if($design->status == "revisi")
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
@endif

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