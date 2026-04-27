@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Admin Dashboard</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Services</h5>
                            <p class="card-text">Total: {{ $servicesCount }}</p>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Manage Services</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Portfolios</h5>
                            <p class="card-text">Total: {{ $portfoliosCount }}</p>
                            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-primary">Manage Portfolios</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Team Members</h5>
                            <p class="card-text">Total: {{ $teamMembersCount }}</p>
                            <a href="{{ route('admin.team-members.index') }}" class="btn btn-primary">Manage Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection