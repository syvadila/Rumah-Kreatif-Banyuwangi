@extends('template-landingpage.master')

@section('head')
<div class="container-xxl bg-primary page-header">
    <div class="container">

        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h2 class="mb-5 text-white">Informasi</h2>
            <div class="d-inline-block border rounded-pill text-white px-4 mb-3"></div>
            <div class="form-group py-3 row">
                <label class="text-white" for="">Filter Tanggal</label>
                <div class="col-md-6 mx-auto">
                    <form action="{{url('katalog')}}" action="GET">
                        <input type="text" name="daterange" value="{{request()->get('daterange')}}" class="form-control text-center" />
                        <button type="submit" class="btn btn-sm mx-auto btn-warning mt-2">Cari</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="row g-4">

            @foreach($katalogs as $katalog)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white rounded h-100">
                    <div class="d-flex justify-content-between">
                        <img src="{{asset('public/katalog/'.$katalog->foto)}}" alt="" srcset="" class="w-100" style="height:210px;">
                    </div>
                    <div class="p-5">
                        <span style="font-size:10px;">{{date('d-m-Y', strtotime($katalog->tanggal_awal));}} sd {{date('d-m-Y', strtotime($katalog->tanggal_akhir));}}</span>
                        <h5 class="mb-3">{{$katalog->judul}}</h5>
                        <span>{{$katalog->deskripsi}}</span>
                    </div>
                    <h6 style="font-size:10px;" class="px-3 py-3 text-end">{{date('d-m-Y', strtotime($katalog->created_at));}}</h6>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection

@section('content')



@endsection

@section('js')
<script>
    $(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    });
</script>
@endsection