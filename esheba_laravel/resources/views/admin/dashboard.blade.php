@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold">Dashboard Overview</h2>
            <p class="text-muted">Welcome back! Here's what's happening with your website today.</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Services Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 p-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-3 p-3">
                            <i class="fas fa-concierge-bell fa-2x"></i>
                        </div>
                        <div class="text-end">
                            <h6 class="text-muted mb-0">Total Services</h6>
                            <h3 class="fw-bold mb-0">{{ $servicesCount }}</h3>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-top">
                        <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-link text-primary p-0 fw-semibold text-decoration-none">
                            Manage Services <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolios Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 p-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-shape bg-success bg-opacity-10 text-success rounded-3 p-3">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </div>
                        <div class="text-end">
                            <h6 class="text-muted mb-0">Portfolios</h6>
                            <h3 class="fw-bold mb-0">{{ $portfoliosCount }}</h3>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-top">
                        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-sm btn-link text-success p-0 fw-semibold text-decoration-none">
                            View Portfolio <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Members Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 p-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="icon-shape bg-warning bg-opacity-10 text-warning rounded-3 p-3">
                            <i class="fas fa-user-tie fa-2x"></i>
                        </div>
                        <div class="text-end">
                            <h6 class="text-muted mb-0">Team Members</h6>
                            <h3 class="fw-bold mb-0">{{ $teamMembersCount }}</h3>
                        </div>
                    </div>
                    <div class="mt-4 pt-3 border-top">
                        <a href="{{ route('admin.team-members.index') }}" class="btn btn-sm btn-link text-warning p-0 fw-semibold text-decoration-none">
                            Manage Team <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 bg-dark text-white p-4 overflow-hidden position-relative">
                <div class="card-body position-relative z-1">
                    <h3 class="fw-bold mb-2">Need to reach your clients?</h3>
                    <p class="opacity-75 mb-4">Send mass emails or SMS directly from your dashboard.</p>
                    <a href="{{ route('admin.send-message.index') }}" class="btn btn-light fw-bold px-4">
                        <i class="fas fa-paper-plane me-2"></i> Open Message Center
                    </a>
                </div>
                <div class="position-absolute end-0 top-0 h-100 opacity-25 d-none d-md-block" style="width: 300px; background: linear-gradient(90deg, transparent, var(--primary-color)); transform: skewX(-20deg) translateX(50px);"></div>
                <i class="fas fa-envelope-open-text position-absolute end-0 bottom-0 m-4 fa-5x opacity-10"></i>
            </div>
        </div>
    </div>
</div>
@endsection