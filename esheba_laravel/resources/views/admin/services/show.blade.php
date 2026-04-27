@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Service Details</h1>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->title }}</h5>
                    
                    @if($service->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/services/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid">
                        </div>
                    @endif
                    
                    <p class="card-text"><strong>Description:</strong> {{ $service->description }}</p>
                    <p class="card-text"><strong>Price:</strong> {{ $service->price }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $service->is_active ? 'Active' : 'Inactive' }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $service->created_at->format('M d, Y H:i') }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $service->updated_at->format('M d, Y H:i') }}</p>
                    
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection