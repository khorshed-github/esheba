@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Service</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $service->description) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $service->price) }}">
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($service->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/services/' . $service->image) }}" alt="{{ $service->title }}" width="100">
                        </div>
                    @endif
                </div>
                
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection