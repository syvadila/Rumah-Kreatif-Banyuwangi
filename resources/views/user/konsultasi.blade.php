@extends('template.master')

@section('css')
<style>
.lds-dual-ring {
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 8px;
  border-radius: 50%;
  border: 6px solid red;
  border-color: red transparent red transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>
@endsection

@section('content')




<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Atur Jadwal Konsultasi Anda</h6>
    </div>
    <div class="card-body">

        @if($jadwal_konsultasi == null)
        <div class="card shadow mb-4">
            <div class="card-body">
                
                <form action="{{url('user/konsultasi')}}" method="post">
                    @csrf
                    <div class="fom-group row mb-3">
                        <div class="col-md-4">
                            <label for="">Konsultasi</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="konsultasi" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-4">
                            <label for="">Pilih Tanggal</label>
                        </div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="tanggal" required>
                        </div>
                    </div>

                    <div id="loading" class="lds-dual-ring mx-auto d-none"></div>

                    <span id="status-tersedia" class="badge badge-success mx-auto  mb-3 d-none">Jadwal Tersedia</span>
                    <span id="status-penuh" class="badge badge-danger mx-auto  mb-3 d-none">Jadwal Tidak Tersedia (Silahkan Pilih Tanggal Lain)</span>

                    <button id="btn-kirim" class="btn btn-sm btn-primary float-right" disabled>Kirim Jadwal</button>

                </form>
                
            </div>
        </div>

        @elseif($jadwal_konsultasi != null)

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Anda Memiliki Jadwal Konsultasi</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="{{asset('public/template/img/undraw_posting_photo.svg')}}" alt="...">
                </div>
                <p>Jadwal Konsultasi : </p>
                <p>Konsultasi : {{ $jadwal_konsultasi->konsultasi }}</p>
                <p>Hari : {{Carbon\Carbon::createFromFormat('Y-m-d', $jadwal_konsultasi->tanggal)->isoFormat('dddd')}}</p>
                <p>Tanggal : {{Carbon\Carbon::createFromFormat('Y-m-d', $jadwal_konsultasi->tanggal)->format('d-m-Y')}}</p>
            </div>
        </div>

        @endif


    </div>
</div>

@endsection

@section('js')

<script>
    $("[name='tanggal']").change(function(){
        $("#loading").removeClass("d-none");
        axios.post("{{url('user/konsultasi/cekjadwal')}}", {
            tanggal: $("[name='tanggal']").val()
        })
        .then((res)=>{
            console.log(res)
            $("#loading").addClass("d-none");
            if(res.data.status == 'tersedia'){
                $("#status-tersedia").removeClass("d-none");
                $("#status-penuh").addClass("d-none");
                $("#btn-kirim").prop('disabled', false);
            }else{
                $("#status-tersedia").addClass("d-none");
                $("#status-penuh").removeClass("d-none");
                $("#btn-kirim").prop('disabled', true);
            }
        })
    });
</script>

@endsection