@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2>Client Details</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Company:</strong> {{ $client->company_name }}</p>
            <p><strong>Client:</strong> {{ $client->client_name }}</p>
            <p><strong>Email:</strong> {{ $client->email ?? 'N/A' }}</p>
            <p><strong>Mobile:</strong> {{ $client->mobile }}</p>
            <p><strong>URL:</strong> {{ $client->url }}</p>
            <p><strong>Domain:</strong> {{ $client->domain }}</p>
            <p><strong>Hosting:</strong> {{ $client->hosting }}</p>
            <p><strong>Expire Date:</strong> {{ $client->expire_date }}</p>
            <p><strong>Amount:</strong> {{ $client->amount }}</p>
            <p><strong>Status:</strong> {!! $client->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Blocked</span>' !!}</p>
            <a href="{{ route('admin.client-info.edit', $client->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.client-info.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection