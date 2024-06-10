<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assetss/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assetss/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assetss/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          FC
        </a>
        <a href="" class="simple-text logo-normal">
          FurniCrafts
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ request()->is('admin') ? 'active' : '' }}">
            <a href="/admin">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ request()->is('users') ? 'active' : '' }}">
            <a href="/users">
              <i class="now-ui-icons education_atom"></i>
              <p>User</p>
            </a>
          </li>
          <li class="{{ request()->is('category') ? 'active' : '' }}">
            <a href="/category">
              <i class="now-ui-icons location_map-big"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="{{ request()->is('products') ? 'active' : '' }}">
            <a href="/products">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Product</p>
            </a>
          </li>
          <li class="{{ request()->is('shipping') ? 'active' : '' }}">
            <a href="/shipping">
              <i class="now-ui-icons users_single-02"></i>
              <p>Shipping</p>
            </a>
          </li>
          <li class="{{ request()->is('transaction') ? 'active' : '' }}">
            <a href="/transaction">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Transaction</p>
            </a>
          </li>
          <li class="{{ request()->is('report') ? 'active' : '' }}">
            <a href="/report">
              <i class="now-ui-icons text_caps-small"></i>
              <p>Report</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="/logout">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo" style="font-size: larger;">Welcome Back, {{ Auth::user()->name }}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            {{-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> --}}
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assetss/js/core/jquery.min.js"></script>
  <script src="../assetss/js/core/popper.min.js"></script>
  <script src="../assetss/js/core/bootstrap.min.js"></script>
  <script src="../assetss/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assetss/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assetss/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assetss/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assetss/demo/demo.js"></script>

  @yield('scripts')
</body>

</html>
