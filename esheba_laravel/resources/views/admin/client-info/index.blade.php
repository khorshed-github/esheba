@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Client Info</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.client-info.create') }}" class="btn btn-success">Add Client</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Client</th>
                        <th>Mobile</th>
                        <th>Domain</th>
                        <th>Hosting</th>
                        <th>Expire Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->company_name }}</td>
                            <td>{{ $client->client_name }}</td>
                            <td>{{ $client->mobile }}</td>
                            <td>{{ $client->domain }}</td>
                            <td>{{ $client->hosting }}</td>
                            <td>{{ $client->expire_date }}</td>
                            <td>{{ $client->amount }}</td>
                            <td>{!! $client->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Blocked</span>' !!}</td>
                            <td>
                                <a href="{{ route('admin.client-info.edit', $client->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.client-info.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this client?')">Delete</button>
                                </form>
                                <form action="{{ route('admin.client-info.block', $client->id) }}" method="POST" style="display:inline-block; margin-left:4px;">
                                    @csrf
                                    <button class="btn btn-sm btn-warning">{{ $client->status ? 'Block' : 'Unblock' }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection