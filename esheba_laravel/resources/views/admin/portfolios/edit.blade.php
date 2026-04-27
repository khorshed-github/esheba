@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Portfolio</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $portfolio->title) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $portfolio->description) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="website_url">Website URL</label>
                    <input type="url" class="form-control" id="website_url" name="website_url" value="{{ old('website_url', $portfolio->website_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="sort_order">Sort Order</label>
                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $portfolio->sort_order) }}">
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($portfolio->image)
                        <div class="mt-2">
                            <img src="{{ asset('public/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" width="100">
                        </div>
                    @endif
                </div>
                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', $portfolio->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Portfolio</button>
                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection