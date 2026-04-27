@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Services</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New Service</a>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->price }}</td>
                            <td>{{ $service->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No services found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection