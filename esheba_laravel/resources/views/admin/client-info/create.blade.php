@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h2>Add Client</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.client-info.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Client Name</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="url" name="url" class="form-control" value="{{ old('url') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Domain</label>
            <input type="text" name="domain" class="form-control" value="{{ old('domain') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Hosting</label>
            <input type="text" name="hosting" class="form-control" value="{{ old('hosting') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Expire Date</label>
            <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount') }}">
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('admin.client-info.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
