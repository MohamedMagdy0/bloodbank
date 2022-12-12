   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->

    <a href="/" class="brand-link text-center text-white">
      {{-- <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light"> <h3>{{ config('app.name') }}</span></h3>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex mx-auto">
        <div class="image">
            @if (auth()->check())
                <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="User Image">
            @else

            @endif
        </div>


        <div class="info">
          <a href="{{ route('profile.show') }}" class="d-block mx-auto text-center">
            @if (auth()->check())
            {{ Auth::user()->name }}
            @else
               <span class="mx-auto text-center">User</span>
            @endif
        </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <!-- start Governorates -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-flag-checkered"></i>
              <p>
                Governorates
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('governorates.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Governorates</p>
                </a>
              </li> <!-- All Governorates -->
              <li class="nav-item">
                <a href="{{ route('governorates.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Governorates</p>
                </a>
              </li><!-- Create Governorates -->
              <li class="nav-item">
                <a href="{{ route('governorates.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Governorates Trash -->

            </ul>
          </li><!-- End Governorates -->



            <!-- start Cities -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-city"></i>
              <p>
                Cities
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cities.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Cities</p>
                </a>
              </li> <!-- All Governorates -->
              <li class="nav-item">
                <a href="{{ route('cities.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Cities</p>
                </a>
              </li><!-- Create cities -->
              <li class="nav-item">
                <a href="{{ route('cities.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  cities Trash -->

            </ul>
          </li><!-- End Cities -->


            <!-- start categories -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-palette"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Categories</p>
                </a>
              </li> <!-- All Governorates -->
              <li class="nav-item">
                <a href="{{ route('categories.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Category</p>
                </a>
              </li><!-- Create Categories -->
              <li class="nav-item">
                <a href="{{ route('categories.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Categories Trash -->


            </ul>
          </li><!-- End Categories -->




            <!-- start posts -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-map-signs"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Posts</p>
                </a>
              </li> <!-- All Posts -->
              <li class="nav-item">
                <a href="{{ route('posts.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Post</p>
                </a>
              </li><!-- Create Posts -->
              <li class="nav-item">
                <a href="{{ route('posts.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  posts Trash -->


            </ul>
          </li><!-- End Posts -->






            <!-- start clients -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('clients.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Clients</p>
                </a>
              </li> <!-- All Clients -->
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Client</p>
                </a>
              </li><!-- Create Client -->
              <li class="nav-item">
                <a href="{{ route('clients.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Clients Trash -->

            </ul>
          </li><!-- End Clients -->



            <!-- start bloodTypes -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-hands-helping"></i>
              <p>
                donationRequests
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('donations.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All donationRequest</p>
                </a>
              </li> <!-- All Clients -->
              {{-- <li class="nav-item">
                <a href="{{ route('blood-types.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add donationRequest</p>
                </a>
              </li><!-- Create Client --> --}}
              <li class="nav-item">
                <a href="{{ route('donations.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Clients Trash -->

            </ul>
          </li><!-- End bloodTypes -->


            <!-- start donationRequest -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-hand-holding-heart"></i>
              <p>
                BloodTypes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blood-types.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All BloodTypes</p>
                </a>
              </li> <!-- All Clients -->
              <li class="nav-item">
                <a href="{{ route('blood-types.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add BloodType</p>
                </a>
              </li><!-- Create Client -->
              <li class="nav-item">
                <a href="{{ route('blood-types.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Clients Trash -->

            </ul>
          </li><!-- End donationRequest -->



            <!-- start Contacts -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-envelope-open"></i>
              <p>
                Contacts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contacts.home') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Contacts</p>
                </a>
              </li> <!-- All contacts -->
              {{-- <li class="nav-item">
                <a href="{{ route('blood-types.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add BloodType</p>
                </a>
              </li><!-- contacts Client --> --}}
              <li class="nav-item">
                <a href="{{ route('contacts.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Contacts Trash -->

            </ul>
          </li><!-- End Contacts -->



            <!-- start Users -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li> <!-- All Users -->
              <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li><!-- Create Users -->
              <li class="nav-item">
                <a href="{{ route('users.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Users Trash -->

            </ul>
          </li><!-- End Users -->


            <!-- start Users -->
          <li class="nav-item "> <!-- menu-open -->
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-star-half-alt"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Roles</p>
                </a>
              </li> <!-- All Users -->
              <li class="nav-item">
                <a href="{{ route('roles.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Role</p>
                </a>
              </li><!-- Create Users -->
              {{-- <li class="nav-item">
                <a href="{{ route('users.trash') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trash</p>
                </a>
              </li><!--  Roles Trash --> --}}

            </ul>
          </li><!-- Roles Users -->
















          <!-- start Profile -->
          <li class="nav-item">
            <a href="{{ route('change-password') }}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>Change Password</p>
            </a>
          </li> <!-- Profile -->
          <!-- start Profile -->
          <li class="nav-item">
            <a href="{{ route('settings.edit') }}" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>Settings</p>
            </a>
          </li> <!-- Profile -->

          <!-- start Profile -->
          <li class="nav-item">
            <a href="{{ route('profile.show') }}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>Profile</p>
            </a>
          </li> <!-- Profile -->


        <!-- start Logout -->
          <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link">
              <i class="nav-icon fas fa-door-open"></i>
              <p>Logout</p>
            </a>
          </li><!-- Logout -->


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
