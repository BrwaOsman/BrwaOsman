<html>
<head>

    
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<title>Shifa Laboratory</title>

{{-- <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
crossorigin="anonymous"/>
@yield('third_party_stylesheets')

@stack('page_css')
{{-- code livewire --}}
@livewireStyles
@livewireScripts

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<!-- Main Header -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>
</ul>

<ul class="ml-auto navbar-nav">
  <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="img/ss.jpg"
               class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
              <img src="img/ss.jpg"
                   class="img-circle elevation-2"
                   alt="User Image">
              <p>
                  {{ Auth::user()->name }}
                  <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
              </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
              <a href="http://localhost/pharma/public/Users" class="btn btn-default btn-flat">Profile</a>
              <a href="#" class="float-right btn btn-default btn-flat"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Sign out
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>
      </ul>
  </li>
</ul>
</nav>

<script src="{{ asset('js/app.js') }}" ></script>

<!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
  @yield('content')
</section>
</div>


<!-- Main Footer -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b style="font-size: 20px"> ناونیشان : چەمچەماڵ-شەقامی پزیشکان- بەرامبەرگەراجی تەکیە</b>
            <br>
           <p class="text-right"  style="font-size: 20px"> ژ.م: 07510319385 – 07502931517  </p>
    </div>
    <strong>            Fb:تەلاری پزیشکی شیفا
        <br>      Copyright &copy; 2020 - 2021 <a href="https://www.facebook.com/brwa.osman.902">Brwa osman</a> Programmer 

    </strong> 
</footer>
</div>



@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>