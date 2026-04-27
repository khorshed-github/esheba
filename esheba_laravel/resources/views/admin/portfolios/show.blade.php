@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Portfolio Details</h1>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $portfolio->title }}</h5>
                    
                    @if($portfolio->image)
                        <div class="mb-3">
                            <img src="{{ asset('public/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                        </div>
                    @endif
                    
                    <p class="card-text"><strong>Description:</strong> {{ $portfolio->description }}</p>
                    <p class="card-text"><strong>Website URL:</strong> <a href="{{ $portfolio->website_url }}" target="_blank">{{ $portfolio->website_url }}</a></p>
                    <p class="card-text"><strong>Sort Order:</strong> {{ $portfolio->sort_order }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $portfolio->is_active ? 'Active' : 'Inactive' }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $portfolio->created_at->format('M d, Y H:i') }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $portfolio->updated_at->format('M d, Y H:i') }}</p>
                    
                    <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection