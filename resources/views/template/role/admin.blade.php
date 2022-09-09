<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Tables -->
<li class="nav-item {{ request()->is('katalogadmin') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('katalogadmin')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Katalog</span></a>
</li>

<li class="nav-item {{ request()->is('asosiasiadmin') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('asosiasiadmin')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Asosiasi</span></a>
</li>

<li class="nav-item {{ request()->is('pendaftar') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('pendaftar')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pendaftar</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('users')}}">
        <i class="fas fa-fw fa-users"></i>
        <span>Users</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item {{ request()->is('konsultasi') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('konsultasi')}}">
        <i class="fas fa-fw fa-table"></i>
        <span> Konsultasi</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item {{ request()->is('design*') ? 'active' : '' }}">
    <a class="nav-link" href="{{url('design')}}">
        <i class="fas fa-fw fa-table"></i>
        <span>Design</span></a>
</li>