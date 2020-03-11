<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Excel Bakers') }}</title>

    <!-- Scripts -->
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    @yield('css')
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
 
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow" data-nav="brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header bg-info">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="#"> 
                            <h3 class="brand-text text-white">Admin Dashboard</h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>

            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="false">
                                <span class="mr-1">Hello,
                                    <span class="user-name text-bold-700">Admin</span>
                                </span>
                                <span class="avatar avatar-online">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifications</span>
                                    </h6>
                                    <span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                                </li>
                                <li class="scrollable-container media-list w-100 ps-container ps-theme-dark" data-ps-id="b8a8a288-b7e0-14c3-4012-7a9a4d8364b4">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                            <h6 class="media-heading">You have new order!</h6>
                                            <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                            <small>
                                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time>
                                            </small>
                                            </div>
                                        </div>
                                    </a>  
                                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
                                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
                                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </li>
                            </ul>
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
        <div class="main-menu-content ps-container ps-theme-dark ps-active-y" data-ps-id="93fe24e0-9096-0030-c111-dae19dd72b49">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item ">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Dashboard</span> 
                </a>
            </li> 
            <li class="nav-item ">
                <a href="{{ route('admin.viewOrders') }}">
                    <i class="ft-layers"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">View Orders</span> 
                </a>
            </li> 
            <li class="nav-item ">
                <a href="/admin/add-product">
                    <i class="la la-plus"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Add Product</span> 
                </a>
            </li>   
            <li class="nav-item ">
                <a href="/admin/view-product">
                    <i class="ft ft-aperture"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">View Product</span> 
                </a>
            </li>   
            <li class="nav-item ">
                <a href="/admin/view-users">
                    <i class="ft ft-user"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">View Users</span> 
                </a>
            </li>  
            <li class="nav-item ">
                <a href="/admin/view-reviews">
                    <i class="ft ft-user"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">View Reviews</span> 
                </a>
            </li>  
        </ul>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 599px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 95px;"></div></div></div>
    </div>
    <div class="app-content content">
        @yield('content')
    </div>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('app-assets/vendors/js/ui/headroom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dragula.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    @yield('js')
</body>
</html>
