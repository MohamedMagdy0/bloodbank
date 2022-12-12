  <!-- start Navbar -->
    @include('layouts.dashboard.app_header')
  <!-- end navbar -->



  <!-- start Navbar -->
    @include('layouts.dashboard.app_nav')
  <!-- /.navbar -->




  <!-- end start Main Sidebar Container -->
    @include('layouts.dashboard.app_sidebar')
  <!-- end Main Sidebar Container -->




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page_title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">@yield('page_title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->




    <!-- Main content -->
        @yield('content')
    <!-- /.content -->

  </div><!-- /.content-wrapper -->




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <h5 class="m-2 text-warning">MENU</h5>
    <div class="pt-3 mx-4">
      <p><a href="{{ route('governorates.index') }}">Governorates</a></p>
      <p><a href="{{ route('cities.index') }}">Cities</a></p>
      <p><a href="{{ route('categories.index') }}">Categories</a></p>
      <p><a href="{{ route('posts.index') }}">Posts</a></p>
    </div>

    <div class="pt-4 mx-4 text-primary">
        <p><a class="text-primary" href="{{ route('profile.show') }}">Profile</a></p>
        <p><a class="text-primary" href="{{ route('login') }}">Login</a></p>
        <p><a class="text-primary" href="{{ route('register') }}">Register</a></p>
        <p><a class="text-primary" href="{{ route('auth.logout') }}">Logout</a></p>
    </div>  <!-- auth -->

  </aside>
  <!-- /.control-sidebar -->



  <!-- start Main Footer -->
    @include('layouts.dashboard.app_footer')
  <!-- end Main Footer -->

