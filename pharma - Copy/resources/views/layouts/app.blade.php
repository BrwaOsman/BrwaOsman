<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shifa Laboratory</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
{{-- <link href="{{ asset('assets/min.css') }}" rel="stylesheet"> --}}


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>
@livewireStyles


<body class="hold-transition sidebar-mini layout-fixed">

    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.0/firebase-app.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.1.0/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries
      
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
          apiKey: "AIzaSyBJ5LhcJiAEipU7NzFVMf_fhKH6HcKGISM",
          authDomain: "laboratory-6d40e.firebaseapp.com",
          projectId: "laboratory-6d40e",
          storageBucket: "laboratory-6d40e.appspot.com",
          messagingSenderId: "391267839966",
          appId: "1:391267839966:web:5eb3a883ad8761e9abf74f",
          measurementId: "G-KX1N9NTDP6"
        };
      
        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
      </script>



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

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    {{-- <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b style="font-size: 20px"> ناونیشان : چەمچەماڵ-شەقامی پزیشکان- بەرامبەرگەراجی تەکیە</b>
                <br>
               <p class="text-right"  style="font-size: 20px"> ژ.م: 07510319385 – 07502931517  </p>
        </div>
        <strong>            Fb:تەلاری پزیشکی شیفا
            <br>      Copyright &copy; 2020 - 2021 <a href="https://www.facebook.com/brwa.osman.902">Brwa osman</a> Programmer 

        </strong> 
    </footer> --}}
</div>

<script src="{{ asset('js/app.js') }}" defer></script>

@yield('third_party_scripts')
@livewireScripts
@stack('page_scripts')
</body>
</html>
