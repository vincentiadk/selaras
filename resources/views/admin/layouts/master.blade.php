<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {!! SEOMeta::generate() !!}
  <!-- Bootstrap -->
  <link href="{{ asset('/tempadmin/assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('/tempadmin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('/tempadmin/assets/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('/tempadmin/assets/iCheck/skins/flat/green.css') }}" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{ asset('/tempadmin/assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{ asset('/tempadmin/assets/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="{{ asset('/tempadmin/assets/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
  <link href="{{ asset('/tempadmin/assets/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/tempadmin/assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/tempadmin/assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/tempadmin/assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/tempadmin/assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="/tempadmin/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="/tempadmin//tempadmin/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="/admin"><i class="fa fa-home"></i> Home </a> 
                    </li>
                    <li>
                        <a href="/admin/page"><i class="fa fa-edit"></i> Halaman</a>
                    </li>
                    <li>
                        <a href="/admin/user"><i class="fa fa-user"></i> User</a>
                    </li>
                    <li>
                        <a><i class="fa fa-table"></i> Services <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/service-categories">Service Category</a></li>
                            <li><a href="/admin/service">Semua Service</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-bar-chart-o"></i> Blog Post<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/admin/blog-categories">Service Category</a></li>
                            <li><a href="/admin/blog">Semua Blog</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="/logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="/tempadmin//tempadmin/images/img.jpg" alt="">{{Auth::user()->name}}
              <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profile</a></li>
              <li>
                <a href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
              </a>
          </li>
          <li><a href="javascript:;">Help</a></li>
          <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
      </ul>
  </li>

  <li role="presentation" class="dropdown">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-envelope-o"></i>
      <span class="badge bg-green">6</span>
  </a>
  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
      <li>
        <a>
          <span class="image"><img src="/tempadmin//tempadmin/images/img.jpg" alt="Profile Image" /></span>
          <span>
            <span>John Smith</span>
            <span class="time">3 mins ago</span>
        </span>
        <span class="message">
            Film festivals used to be do-or-die moments for movie makers. They were where...
        </span>
    </a>
</li>
<li>
    <a>
      <span class="image"><img src="/tempadmin//tempadmin/images/img.jpg" alt="Profile Image" /></span>
      <span>
        <span>John Smith</span>
        <span class="time">3 mins ago</span>
    </span>
    <span class="message">
        Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
</a>
</li>
<li>
    <a>
      <span class="image"><img src="/tempadmin/images/img.jpg" alt="Profile Image" /></span>
      <span>
        <span>John Smith</span>
        <span class="time">3 mins ago</span>
    </span>
    <span class="message">
        Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
</a>
</li>
<li>
    <a>
      <span class="image"><img src="/tempadmin/images/img.jpg" alt="Profile Image" /></span>
      <span>
        <span>John Smith</span>
        <span class="time">3 mins ago</span>
    </span>
    <span class="message">
        Film festivals used to be do-or-die moments for movie makers. They were where...
    </span>
</a>
</li>
<li>
    <div class="text-center">
      <a>
        <strong>See All Alerts</strong>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
</li>
</ul>
</li>
</ul>
</nav>
</div>
</div>
<!-- /top navigation -->
@yield('dashboard')
<div class="right_col" role="main">
    @yield('content')
</div>
<!-- page content -->

<!-- /page content -->

<!-- footer content -->
<footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="{{ asset('/tempadmin/assets/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/tempadmin/assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/tempadmin/assets/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('/tempadmin/assets/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('/tempadmin/assets/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('/tempadmin/assets/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('/tempadmin/assets/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/tempadmin/assets/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('/tempadmin/assets/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('/tempadmin/assets/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('/tempadmin/assets/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('/tempadmin/assets/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('/tempadmin/assets/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('/tempadmin/assets/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('/tempadmin/assets/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="/tempadmin/js/custom.min.js"></script>
@yield('script')
</body>
</html>
