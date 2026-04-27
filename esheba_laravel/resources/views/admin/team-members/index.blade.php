@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Team Members</h1>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">Add New Team Member</a>
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teamMembers as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->position }}</td>
                            <td>{{ $member->sort_order }}</td>
                            <td>{{ $member->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('admin.team-members.show', $member->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.team-members.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No team members found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection