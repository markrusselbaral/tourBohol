<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8" />
      <title>Travel - Admin Dashboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
      <meta content="" name="author" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
      <!-- App css -->
      @yield('css')
      <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
   </head>
   <body id="body" class="dark-sidebar">
      <div class="left-sidebar">
         <!-- LOGO -->
         <div class="brand">
            <a href="index.html" class="logo">
            <span style="color: white;">
                Travel Dashboard
            </span>
            </a>
         </div>
         <!--end logo-->
         <div class="menu-content h-100" data-simplebar>
            <div class="menu-body navbar-vertical tab-content">
               <div class="collapse navbar-collapse" id="sidebarCollapse">
                  <!-- Navigation -->
                  <ul class="navbar-nav">
                     <li class="menu-label mt-0">M<span>ain</span></li>
                     <li class="nav-item">
                        <a class="nav-link" style="color:{{ request()->is('admin/home') ? 'white;' : '' }}"  href="{{ route('home.index') }}" role="button"
                           aria-expanded="false" aria-controls="sidebarAnalytics">
                        <i class="ti ti-stack menu-icon"></i>
                        <span>Home</span>
                        </a>
                     </li>
                     <!--end nav-item-->
                     <li class="nav-item">
                        <a class="nav-link" style="color:{{ request()->is('admin/about') ? 'white;' : '' }}" href="{{ route('about.index') }}" role="button"
                           aria-expanded="false" aria-controls="sidebarCrypto">
                        <i class="ti ti-stack menu-icon"></i>
                        <span>About</span>
                        </a>
                     </li>
                     <!--end nav-item-->
                     <li class="nav-item">
                        <a class="nav-link" style="color:{{ request()->is('admin/destination') ? 'white;' : '' }}" href="{{ route('destination.index') }}" role="button"
                           aria-expanded="false" aria-controls="sidebarCRM">
                        <i class="ti ti-stack menu-icon"></i>
                        <span>Destination</span>
                        </a>
                     </li>
                     <!--end nav-item-->
                     <li class="nav-item">
                        <a class="nav-link" style="color:{{ request()->is('admin/gallery') ? 'white;' : '' }}" href="{{ route('gallery.index') }}" role="button"
                           aria-expanded="false" aria-controls="sidebarProjects">
                        <i class="ti ti-stack menu-icon"></i>
                        <span>Gallery</span>
                        </a>
                     </li>
                     <!--end nav-item-->
                     <form action="{{ route('logout') }}" method="POST">
                        @csrf
                     <li class="nav-item">
                        <button class="nav-link" role="button" aria-expanded="false" aria-controls="sidebarHelpdesk" style="background: none; border: none;">
                        <i class="ti ti-user menu-icon"></i>
                        <span>Logout</span>
                        </button>
                     </li>
                     </form>
                     <!--end nav-item-->
                  </ul>
                  <!--end navbar-nav--->
               </div>
               <!--end sidebarCollapse-->
            </div>
         </div>
      </div>
      <!-- end left-sidenav-->
      <!-- Top Bar Start -->
      <!-- Top Bar Start -->
      <div class="topbar">
         <!-- Navbar -->
         <nav class="navbar-custom" id="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">
               <!--end topbar-language-->
               <li class="dropdown notification-list">
                  <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
                     aria-haspopup="false" aria-expanded="false">
                  <i class="ti ti-mail"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
                     <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                        Emails <span class="badge bg-soft-primary badge-pill">3</span>
                     </h6>
                     <div class="notification-menu" data-simplebar>
                        <!-- item-->
                        <!--end-item-->
                        <!-- item-->
                        <a href="#" class="dropdown-item py-3">
                           <div class="media">
                              <div class="media-body align-self-center ms-2 text-truncate">
                                 <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                                 <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                              </div>
                              <!--end media-body-->
                           </div>
                           <!--end media-->
                        </a>
                        <!--end-item-->
                     </div>
                     <!-- All-->
                     <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                     View all <i class="fi-arrow-right"></i>
                     </a>
                  </div>
               </li>

               <li class="dropdown">
                  <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                     aria-haspopup="false" aria-expanded="false">
                     <div class="d-flex align-items-center">
                        <div>
                           <small class="d-none d-md-block font-11">Admin</small>
                           <span class="d-none d-md-block fw-semibold font-12">Mark Russel Baral <i
                              class="mdi mdi-chevron-down"></i></span>
                        </div>
                     </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item">
                            <i class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
                        </button>
                    </form>
                  </div>
               </li>
               <!--end topbar-profile-->

            </ul>
            <!--end topbar-nav-->
         </nav>
         <!-- end navbar-->
      </div>
      <!-- Top Bar End -->
      <!-- Top Bar End -->
      @yield('content')
      <!-- Javascript  -->
      <!-- vendor js -->
      @yield('js')
      <!-- App js -->
      <script src="{{ asset('admin/assets/js/app.js') }}"></script>
      @yield('edit')
   </body>
   <!--end body-->
</html>
