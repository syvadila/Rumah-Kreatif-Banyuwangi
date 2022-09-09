@extends('template.master')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Design Produk</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul Design</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
              
                <tbody>
                 
                @foreach($designs as $design)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$design->name}}</td>
                        <td>{{$design->nama_design}}</td>
                        <td>{{$design->deskripsi}}</td>
                        <td>
                            @if($design->status == "rilis")
                            <span class="badge badge-success">
                                Design Sudah dikirim
                            </span>
                            @elseif($design->status == "selesai")
                            <span class="badge badge-success">
                                {{$design->status}}
                            </span>
                            @else
                            <span class="badge badge-warning">
                                {{$design->status}}
                            </span>
                            @endif
                        </td>
                        <td>
                            @if($design->status == "rilis" || $design->status == "selesai" )
                            -
                            @else
                            <a href="{{url('design/'.$design->id)}}" class="btn btn-sm btn-warning">
                                <i class="fa fa-link" aria-hidden="true"></i>
                            </a>
                            @endif
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
    var table = $('#dataTable').DataTable();
</script>

@endsection