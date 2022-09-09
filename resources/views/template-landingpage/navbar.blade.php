<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{url('')}}" class="navbar-brand p-0">
        <!-- <h1 class="m-0">BizConsult</h1> -->
        <img src="{{('public/image/logo.png')}}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{url('/')}}" class="nav-item nav-link {{request()->is('/') ? 'active' : '' }}">Beranda</a>
            <a href="{{url('asosiasi')}}" class="nav-item nav-link {{request()->is('asosiasi') ? 'active' : '' }}">Asosiasi</a>
            <a href="{{url('jasa')}}" class="nav-item nav-link {{request()->is('jasa') ? 'active' : '' }}">Fasilitas</a>
            <a href="{{url('katalog')}}" class="nav-item nav-link {{request()->is('katalog') ? 'active' : '' }}">Informasi</a>
            
        </div>
        <a href="{{url('login')}}" class="btn btn-light rounded-pill text-primary py-2 px-4 ms-lg-5">Masuk</a>
    </div>
</nav>