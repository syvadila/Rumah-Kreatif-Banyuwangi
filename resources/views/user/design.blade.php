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

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Pesan Design</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Design Saya</a>
    </li>

</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

        @if($pesanan_design == null)
        <div class="card shadow mb-3">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Pesan Design</h6>
            </div>
            <div class="card-body">

                <form action="{{url('user/design')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Nama Design</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_design" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputnama" class="col-sm-2 col-form-label">Jenis Design</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="jenis_design" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputjudul" class="col-sm-2 col-form-label">Deskripsi Design</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputjudul" class="col-sm-2 col-form-label">Contoh Design</label>
                        <div class="col-sm-10">
                            <img src="" alt="" id="blah">
                            <input type="file" name="foto" class="form-control " accept="image/*"
                                onchange="readURL(this)">
                        </div>
                    </div>

                    <button class="btn btn-primary float-right">Kirim</button>

                </form>

            </div>
        </div>
        @elseif($pesanan_design->status == "pending" || $pesanan_design->status == "revisi")

        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Design Anda Sedang diproses</h6>
            </div>
            <div class="card-body">
                <div class="row dashed">
                    <div class="col-md-6 border-right">
                        <div class="row">
                            <div class="col">Nama Design </div>
                            <div class="col-9">: {{$pesanan_design->nama_design}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Jenis Design </div>
                            <div class="col-9">: {{$pesanan_design->jenis_design}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Deskripsi </div>
                            <div class="col-9">: {{$pesanan_design->deskripsi}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mx-auto">
                            <h6>Contoh Design</h6>
                            <img class="mx-auto d-block" src="{{asset('public/design/contoh/'.$pesanan_design->foto)}}"
                                alt="" width="150px;">

                        </div>
                    </div>
                </div>

            </div>
        </div>

        @elseif($pesanan_design->status == "rilis")

        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Design Anda Selesai Di Design</h6>
            </div>
            <div class="card-body">
                <div class="row dashed">
                    <div class="col-md-6 border-right">
                        <div class="row">
                            <div class="col">Nama Design </div>
                            <div class="col-9">: {{$pesanan_design->nama_design}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Jenis Design </div>
                            <div class="col-9">: {{$pesanan_design->jenis_design}}</div>
                        </div>
                        <div class="row">
                            <div class="col">Deskripsi </div>
                            <div class="col-9">: {{$pesanan_design->deskripsi}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mx-auto">
                            <h6>Contoh Design</h6>
                            <img class="mx-auto d-block" src="{{asset('public/design/contoh/'.$pesanan_design->foto)}}"
                                alt="" width="150px;">

                        </div>
                    </div>
                </div>


                <h6 class="m-0 font-weight-bold text-primary mt-3">Hasil Design</h6>
                <div class="row dashed mt-2">
                    <div class="col-md-6 border-right">
                        <div class="mx-auto">
                            @if(!$pesanan_design->revisi->isEmpty())
                            <img class="mx-auto d-block"
                                src="{{asset('public/design/revisi/'.$pesanan_design->revisi->last()->foto_hasil)}}"
                                alt="" width="150px;">
                            @endif

                        </div>
                    </div>

                    <div class="col-md-6">

                        <div id="opsi_revisi">
                            <a class="btn btn-success" href="{{url('user/revisidesign/'.$pesanan_design->id)}}">
                                <i class="fa fa-check"></i> Selesai
                            </a>
                            <button class="btn btn-warning" onClick="revisiContainer()">
                                <i class="fa fa-edit"></i> Revisi
                            </button>
                        </div>

                        <div id="revisiDesign" class="d-none">

                            <form action="{{url('user/revisidesign/'.$pesanan_design->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Deskripsi Revisi</label>
                                    <textarea name="deskripsi_revisi" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto Contoh Revisi(Opsional)</label>
                                    <input type="file" name="foto_revisi" id="" class="form-cotrol" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-right">Unggah Revisi</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        @endif

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Design Produk Saya</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Design</th>
                                <th>Jenis Design</th>
                                <th>Deskripsi</th>
                                <th>Design</th>
                                <th>Download</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($design_saya as $design)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$design->nama_design}}</td>
                                    <td>{{$design->jenis_design}}</td>
                                    <td>{{$design->deskripsi}}</td>
                                    <td>
                                        <img src="{{asset('public/design/revisi/'.$design->revisi->last()->foto_hasil)}}" style="width:30px;">
                                    </td>
                                    <td>
                                        <a href="{{url('user/downloaddesign/'.$design->revisi->last()->id)}}" class="btn btn-success">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>




@endsection

@section('js')
<script>

    @if(Session::has('sukses-selesai'))
    $("#profile-tab").click()
    Swal.fire({
        title: "{{Session::get('sukses-selesai')}}",
        type: 'success',
        icon: 'success',
        confirmButtonText: 'Ok'
    });
    @endif

    var table = $('#dataTable').DataTable();

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result).width(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function revisiContainer() {
        $("#revisiDesign").removeClass("d-none")
        $("#opsi_revisi").addClass("d-none")
    }
</script>

@endsection