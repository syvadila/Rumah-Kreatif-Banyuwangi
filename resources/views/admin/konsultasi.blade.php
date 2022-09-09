@extends('template.master')

@section('content')


<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Jadwal Konsultasi</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-5 mb-3">
                <div class="row">
                <div class="col-6">
                <label for="">Tanggal Konsultasi</label>
                </div>
                <div class="col-6">
                <input type="date" class="form-control" name="tanggal">
                </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Konsultasi</th>
                    </tr>
                </thead>
              
                <tbody>
                  
                @foreach($jadwal_konsultasis as $konsultasi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$konsultasi->tanggal}}</td>
                        <td>{{$konsultasi->name}}</td>
                        <td>{{$konsultasi->konsultasi}}</td>
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

    var table = $('#dataTable').DataTable();
    $(document).ready(()=>{
        // let tanggal_sekarang = moment().format("YYYY-MM-D");
        // $("[name='tanggal']").val(tanggal_sekarang);
        // filterTanggal(tanggal_sekarang)
    })

    $("[name='tanggal']").change(()=>{
        let tanggal = $("[name='tanggal']").val();
        filterTanggal(tanggal)
    })

    function filterTanggal(tanggal){
        table
        .columns(1)
        .search(tanggal)
        .draw();
    }
</script>

@endsection