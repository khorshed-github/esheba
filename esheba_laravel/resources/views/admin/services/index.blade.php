@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold">Services</h2>
                <p class="text-muted">Manage the services offered on your website.</p>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i> Add New Service
            </a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $service->id }}</td>
                                <td class="fw-medium text-dark">{{ $service->title }}</td>
                                <td><span class="badge bg-light text-dark fw-normal">{{ $service->price }}</span></td>
                                <td>
                                    @if($service->is_active)
                                        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Active</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-folder-open fa-3x mb-3 opacity-25"></i>
                                        <p>No services found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection