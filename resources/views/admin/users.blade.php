@extends('template.master')

@section('content')


<!-- Page Heading -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Id Card</th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>NIB</th>
                        <th>Nama UMKM</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
              
                <tbody>
                  
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->id_card}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->nik}}</td>
                        <td>{{$user->nib == null ? '-':$user->nib}}</td>
                        <td>{{$user->nama_umkm}}</td>
                        <td>{{$user->kategori}}</td>

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