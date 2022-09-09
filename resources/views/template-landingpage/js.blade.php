<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/landingpage/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('public/landingpage/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('public/landingpage/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('public/landingpage/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- Template Javascript -->
<script src="{{asset('public/landingpage/js/main.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session()->has('sukses'))
    Swal.fire({
        title: 'success',
        text: '{{session()->get("sukses")}}',
        icon: 'success',
        confirmButtonText: 'Close'
    })
    @elseif(session()->has('gagal'))
    Swal.fire({
        title: 'gagal',
        text: '{{session()->get("gagal")}}',
        icon: 'error',
        confirmButtonText: 'Close'
    })
    @endif
</script>

@yield('js')