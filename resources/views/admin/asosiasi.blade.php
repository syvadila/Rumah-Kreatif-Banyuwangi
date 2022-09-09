@extends('template.master')

@section('content')


<!-- Modal -->
<div class="modal fade" id="modal_tambah_form" tabindex="-1" role="dialog" aria-labelledby="modal_tambah_formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_formLabel">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('asosiasiadmin')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Asosiasi</label>
                        <input type="text" class="form-control" name="nama_asosiasi" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Logo Asosiasi</label>
                        <input type="file" class="form-control" name="foto_asosiasi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_hapus_form" tabindex="-1" role="dialog" aria-labelledby="modal_hapus_formLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_hapus_formLabel">Apakah Anda Yakin Mau Menghapus?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a id="btn-hapus" class="btn btn-primary">Hapus</a>
                </div>

        </div>
    </div>
</div>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Asosiasi</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Asosiasi

            <button class="btn btn-sm btn-primary float-right" onclick="tambahAsosiasi()"> <i class="fa fa-plus"></i>
                Tambah</button>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Asosiasi</th>
                        <th>Deskripsi</th>
                        <th>Logo</th>
                        <th>Option</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($asosiasis as $asosiasi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$asosiasi->nama_asosiasi}}</td>
                        <td>{{$asosiasi->deskripsi}}</td>
                        <td>
                            <img src="{{asset('public/asosiasi/'.$asosiasi->foto_asosiasi)}}" alt="" srcset="" style="width:40px;">
                        </td>
                        <td>

                            <button onclick="editAsosiasi({{$asosiasi}})" class="btn btn-sm btn-warning">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <button onclick="hapusAsosiasi({{$asosiasi}})" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Hapus 
                            </button>
                           
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $("#dataTable").DataTable()


    function tambahAsosiasi() {
        $("[name='foto_asosiasi']").parent().removeClass("d-none");
        $("[name='foto_asosiasi']").prop("required",true);
        $("[name='nama_asosiasi']").val('');
        $("[name='deskripsi']").val('');
        $("modal_tambah_formLabel").html("Tambah Asosiasi"); 
        $("#modal_tambah_form form").attr("action", "{{url('asosiasiadmin')}}");
        $('#modal_tambah_form').modal('show');
    }

    function editAsosiasi(asosiasi) {
        $("[name='foto_asosiasi']").parent().addClass("d-none");
        $("[name='foto_asosiasi']").prop("required",false);
        $("[name='nama_asosiasi']").val(asosiasi.nama_asosiasi);
        $("[name='deskripsi']").val(asosiasi.deskripsi);
        $("modal_tambah_formLabel").html("Edit Asosiasi"); 
        $("#modal_tambah_form form").attr("action", "{{url('asosiasiadmin')}}/"+asosiasi.id);
        $('#modal_tambah_form').modal('show');
    }

    function hapusAsosiasi(asosiasi) {
        $("#btn-hapus").attr("href", "{{url('asosiasiadmin/hapus')}}/"+asosiasi.id);
        $('#modal_hapus_form').modal('show');
    }
</script>

@endsection