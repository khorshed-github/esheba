@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Portfolios</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">Add New Portfolio</a>
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
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                        <tr>
                            <td>{{ $portfolio->id }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->sort_order }}</td>
                            <td>{{ $portfolio->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.portfolios.show', $portfolio->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No portfolios found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection