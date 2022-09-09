



@extends('template.master')
@section('css')

@endsection
@section('content')


<div class="row">
    <div class="col-md-6 mb-4 mx-auto">

    <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">IDCARD</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('public/template/img/undraw_posting_photo.sv')}}g" alt="...">
                </div>
                
                <div class="text-center">
                    <h6 class="m-0 font-weight-bold text-primary">ID User {{auth()->user()->id_card}}</h6>
                    <p class="mb-0 mt-0">Nama : {{auth()->user()->name}}</p>
                    <p class="mb-0 mt-0">NIK : {{auth()->user()->nik}}</p>
                    <p class="mb-0 mt-0">Nama UMKM : {{auth()->user()->nama_umkm}}</p>
                    <p class="mb-0 mt-0">Jenis Usaha: {{auth()->user()->kategori}}</p>
                </div>

        </div>



    </div>
</div>


@endsection

@section('js')


@endsection