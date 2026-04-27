<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap-theme.css') }}" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/iline-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/normalize.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 10px 15px;
            display: block;
            text-decoration: none;
        }
        .nav-link:hover, .nav-link.active {
            color: white;
            background-color: #495057;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="text-center mb-4">
            <h4>Admin Panel</h4>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">Services</a>
                <a class="nav-link {{ request()->routeIs('admin.client-info.*') ? 'active' : '' }}" href="{{ route('admin.client-info.index') }}">Client Info</a>
            <a class="nav-link {{ request()->routeIs('admin.send-message.*') ? 'active' : '' }}" href="{{ route('admin.send-message.index') }}">Send SMS/Email</a>
            <a class="nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}">Portfolios</a>
            <a class="nav-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}">Team Members</a>
            <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">Settings</a>
            <a class="nav-link" href="{{ route('home') }}">View Website</a>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow mb-4">
                <div class="container-fluid">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Scripts -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.js') }}"></script>
</body>
</html>