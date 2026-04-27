<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --sidebar-bg: #0f172a;
            --sidebar-text: #94a3b8;
            --sidebar-active-bg: #1e293b;
            --sidebar-active-text: #ffffff;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            color: var(--sidebar-text);
            transition: var(--transition);
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-header h4 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .nav-link {
            color: var(--sidebar-text);
            padding: 0.85rem 1.5rem;
            display: flex;
            align-items: center;
            font-weight: 500;
            border-left: 3px solid transparent;
            transition: var(--transition);
        }

        .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            color: var(--sidebar-active-text);
            background-color: var(--sidebar-active-bg);
        }

        .nav-link.active {
            color: var(--sidebar-active-text);
            background-color: var(--sidebar-active-bg);
            border-left-color: var(--primary-color);
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
            transition: var(--transition);
        }

        .topbar {
            height: 70px;
            background: #fff;
            display: flex;
            align-items: center;
            padding: 0 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .content-wrapper {
            padding: 2rem;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: var(--transition);
            background-color: var(--card-bg);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4><i class="fas fa-shield-halved me-2 text-primary"></i>eSheba</h4>
        </div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                <i class="fas fa-concierge-bell"></i> Services
            </a>
            <a class="nav-link {{ request()->routeIs('admin.client-info.*') ? 'active' : '' }}" href="{{ route('admin.client-info.index') }}">
                <i class="fas fa-users"></i> Client Info
            </a>
            <a class="nav-link {{ request()->routeIs('admin.send-message.*') ? 'active' : '' }}" href="{{ route('admin.send-message.index') }}">
                <i class="fas fa-paper-plane"></i> Send Messages
            </a>
            <a class="nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}">
                <i class="fas fa-briefcase"></i> Portfolios
            </a>
            <a class="nav-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}">
                <i class="fas fa-user-tie"></i> Team Members
            </a>
            <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cog"></i> Settings
            </a>
            <div class="mt-4 pt-3 border-top border-secondary opacity-25"></div>
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-external-link-alt"></i> View Website
            </a>
            <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </aside>

    <div class="main-content">
        <header class="topbar">
            <div class="d-flex align-items-center w-100">
                <button class="btn d-lg-none me-3" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0 fw-bold">Admin Panel</h5>
                <div class="ms-auto d-flex align-items-center">
                    <span class="text-muted me-3">Welcome, {{ Auth::user()->name }}</span>
                    <div class="dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4f46e5&color=fff" class="rounded-circle" width="35" height="35" alt="Avatar">
                    </div>
                </div>
            </div>
        </header>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>