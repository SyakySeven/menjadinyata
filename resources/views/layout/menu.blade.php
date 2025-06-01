<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Praktek Menu</title>

   <link href="{{ asset('asset/d3/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
   <link href="{{ asset('asset/d3/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
   <link href="{{ asset('asset/d3/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
   <link href="{{ asset('asset/d3/lib/jquery-toggles/toggles-full.css') }}" rel="stylesheet">
   <link href="{{ asset('asset/d3/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

   <link rel="stylesheet" href="{{ asset('asset/d3/css/amanda.css') }}">
   <link rel="stylesheet" href="{{ asset('asset/d3/css/custom-welcome.css') }}">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"defer></script>
</head>

<body>
   <div class="am-header">
      <div class="am-header-left">
         <a id="naviconLeft" href="" class="am-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
         <a id="naviconLeftMobile" href="" class="am-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
         <a href= " {{ route ( 'dashboard.index' ) }} "> <i class="am-logo">The Challenger</i></a>
      </div>

      <div class="am-header-right">
         <div class="dropdown dropdown-profile">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
               <img src="img/img3.jpg" class="wd-32 rounded-circle" alt="">
               <span class="logged-name"><span class="hidden-xs-down"></span> <i class="fas fa-cog fa-3x"></i></span>
            </a>
            <div class="dropdown-menu wd-200">
               <ul class="list-unstyled user-profile-nav">
                  <li><a href=" {{ route ('profile.edit') }} "><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                  <li><a href=" {{ route ('logout') }} "><i class="icon ion-power"></i> Sign Out</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <div class="am-sideleft">
      <ul class="nav am-sideleft-tab">
         <li class="nav-item">
            <a href="#mainMenu" class="nav-link active"><i class="icon ion-ios-home-outline tx-24"></i></a>
         </li>
         <li class="nav-item">
            <a href="#mainMenu" class="nav-link"></a>
         </li>
         <li class="nav-item">
            <a href="#mainMenu" class="nav-link"></a>
         </li>
         <li class="nav-item">
            <a href="#mainMenu" class="nav-link"></a>
         </li>
      </ul>

      <ul class="nav am-sideleft-menu">
         @if(Auth::check())
         <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link">
               <i class="icon ion-ios-home-outline"></i>
               <span>Dashboard</span>
            </a>
         </li>

         @if(Auth::check() && (Auth::user()->level == 'admin' || Auth::user()->level == 'user' || Auth::user()->level == 'suplier'))
         <li class="nav-item">
            <a href="{{ route('barang.index') }}" class="nav-link {{ Request::is('barang') ? 'active' : '' }}">
               <i class="icon ion-ios-briefcase-outline"></i>
               <span>Barang</span>
            </a>
         </li>
         @endif

         @if(Auth::check() && (Auth::user()->level == 'admin' || Auth::user()->level == 'user' || Auth::user()->level == 'suplier'))
         <li class="nav-item">
            <a href="{{ route('pembeli.index') }}" class="nav-link {{ Request::is('pembeli') ? 'active' : '' }}">
               <i class="icon ion-ios-people-outline"></i>
               <span>Pembeli</span>
            </a>
         </li>
         @endif

         @if(Auth::check() && (Auth::user()->level == 'admin' || Auth::user()->level == 'suplier' || Auth::user()->level == 'user'))
         <li class="nav-item">
            <a href="{{ route('suplier.index') }}" class="nav-link {{ Request::is('suplier') ? 'active' : '' }}">
               <i class="icon ion-ios-person-outline"></i>
               <span>Suplier</span>
            </a>
         </li>
         @endif

         <li class="nav-item">
            <a href="{{ route('pesanan.index') }}" class="nav-link {{ Request::is('pesanan') ? 'active' : '' }}">
               <i class="icon ion-ios-list-outline"></i>
               <span>Pesanan</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="{{ route('pembelian.index') }}" class="nav-link {{ Request::is('pembelian') ? 'active' : '' }}">
               <i class="icon ion-ios-cart-outline"></i>
               <span>Pembelian</span>
            </a>
         </li>
         {{-- <li class="nav-item mt-4 px-3 d-flex align-items-center"> --}}
            {{-- <img src="{{ asset('asset/d3/img/keren7.jpg') }}" class="rounded-circle mr-2" width="70%" height="100%" alt="User"> --}}
            {{-- <div>
               <div style="font-weight: bold;">Syaky</div>
               <small class="text-muted"></small>
            </div>
         </li> --}}
         @endif
      </ul>
   </div>

<!-- Welcome Box -->
<div class="welcome-box" data-level="{{ Auth::check() ? Auth::user()->level : '' }}">
   <div class="card-body text-center">
      <img src="{{ asset('asset/d3/img/' . (Auth::user()->foto ?? 'keren7.jpg')) }}" class="rounded-circle mb-2" width="70" height="70" alt="User">
      @if(Auth::check())
      <h5 class="card-title typewriter" data-text="Selamat datang {{ Auth::user()->name }}"></h5>
      <p class="card-text">
         Anda login sebagai <strong>{{ Auth::user()->level }}</strong><br>
         Tanggal: {{ dateID() }}
      </p>
      @endif
   </div>
</div>

{{-- <audio id="screamSound" preload="auto"></audio> --}}

<!-- Breadcrumb -->
<div class="am-pagetitle">
   <h5 class="am-title">{{ isset($judul) ? ($judul) : '' }}</h5>
</div> 

<div class="am-mainpanel" style="margin-top:60px">
   <div class="am-pagebody">
      <div class="card">
         <div class="card-body">
            
            @yield('konten')
            
            @if(session('success'))
               <div class="alert alert-success" id="flash">
                     {{ session('success') }}
               </div>
            @endif
            <script>
               setTimeout(function() {
                  document.getElementById('flash').style.display = 'none';
               }, 3000);
            </script>


            @if(session('status'))
            <script>swal.fire({
               // position: "top-end",
                  title: "{{ session ('status') ['judul'] }}",
                  text: "{{ session('status') ['pesan']}}",
                  icon: "{{session('status') ['icon']}}",
                  showConfirmationButton: false,
                  timer: 1500
            });
            </script>
            @endif

         </div>
      </div>
   </div>
</div>

   <script src="{{ asset('asset/d3/lib/jquery/jquery.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/popper.js/popper.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/bootstrap/bootstrap.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/jquery-toggles/toggles.min.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/d3/d3.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/rickshaw/rickshaw.min.js') }}"></script>
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyAEt_DBLTknLexNbTVwbXyq2HSf2UbRBU8"></script>
   <script src="{{ asset('asset/d3/lib/gmaps/gmaps.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/Flot/jquery.flot.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/Flot/jquery.flot.pie.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/Flot/jquery.flot.resize.js') }}"></script>
   <script src="{{ asset('asset/d3/lib/flot-spline/jquery.flot.spline.js') }}"></script>
   <script src="{{ asset('asset/d3/js/amanda.js') }}"></script>
   <script src="{{ asset('asset/d3/js/ResizeSensor.js') }}"></script>
   <script src="{{ asset('asset/d3/js/dashboard.js') }}"></script>
   <script src="{{ asset('asset/d3/js/custom-welcome.js') }}"></script>
</body>

</html>