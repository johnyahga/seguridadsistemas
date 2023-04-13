<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link href="./assets/img/brand/blue.png" rel="icon" type="image/png"> -->
  @include('panels.stylesP')
</head>

<body class="g-sidenav-show bg-gray-100">
  <!-- <div class="min-height-300 bg-gris position-absolute w-100"></div> -->

    @include('panels.navbarP')

  <!-- <div style="background-color: #4a4c51 !important;"  class="min-height-300 bg-primary position-absolute w-100"></div> -->
  
  @include('panels.sidebarP')

  <main class="main-content position-relative border-radius-lg ">
     @yield('content')
    

  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script> -->
  <script src="{{ asset('js/argon-dashboard.min.js?v=2.0.4') }}"></script>

  <script>
    const aas = document.getElementById('navbarFixed');
    navbarFixed(aas);
  </script>

</body>

</html>