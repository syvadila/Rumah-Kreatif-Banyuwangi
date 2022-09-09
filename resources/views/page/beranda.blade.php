@extends('template-landingpage.master')

@section('head')
<div class="container-xxl bg-primary hero-header">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white mb-4 animated zoomIn">Rumah Kreatif Banyuwangi</h1>
                <p class="text-white pb-3 animated zoomIn">
Rumah kreatif Banyuwangi merupakan tempat bagi pelaku usaha di Kabupaten Banyuwangi
dalam mendapatkan arahan dan masukan terkait produknya agar jauh lebih menarik
dan mempunyai daya saing di pasar nasional maupun internasional.</p>
<p class="text-white pb-3 animated zoomIn">
Silahkan daftar asosiasi jika UMKM anda belum terdaftar!
                <a href="{{url('pendaftaran')}}" class="btn btn-outline-light rounded-pill border-2 py-3 px-5 animated slideInRight">Daftar Sekarang</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid animated zoomIn" src="{{('public/landingpage/img/hero2.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

 <!-- About Start -->
 <div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                <img class="img-fluid" src="{{asset('public/landingpage/img/about.png')}}">
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">About Us</div>
                <h2 class="mb-4">Rumah Kreatif</h2>
                <p class="mb-4">
                Pertumbuhan pasar global telah menggeser paradigma bisnis nasional, dimana UKM memegang peranan penting dalam memakmurkan ekonomi negara, baik melalui penciptaan lapangan kerja, mendorong peningkatan kesejahteraan masyarakat, serta menciptakan inovasi baru.Rumah Kreatif Banyuwangi akan mendampingi dan mendorong para pelaku UKM dalam menjawab tantangan utama pengembangan usaha UKM dalam hal Peningkatan kompetensi, Peningkatkan Akses Pemasaran dan Kemudahkan akses Permodalan.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-12 d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                            <i class="fa fa-user-tie text-white"></i>
                        </div>
                        <div class="ms-4">
                            <h6>Konsultasi</h6>
                            <span>Semua pelaku UMKM yang telah terdaftar menjadi anggota Rumah Kreatif Banyuwangi bisa melakukan jadwal konsultasi sesuai tanggal yang diinginkan.</span>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                            <i class="fa fa-chart-line text-white"></i>
                        </div>
                        <div class="ms-4">
                            <h6>Layanan Design</h6>
                            <span>Rumah Kreatif  menyediakan fasilitias design logo , kemasan, dan foto produk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


        

@endsection

