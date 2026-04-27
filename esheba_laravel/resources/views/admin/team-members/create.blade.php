@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Team Member</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}" required>
                </div>
                
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="4">{{ old('bio') }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="facebook_url">Facebook URL</label>
                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ old('facebook_url') }}">
                </div>
                
                <div class="form-group">
                    <label for="twitter_url">Twitter URL</label>
                    <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ old('twitter_url') }}">
                </div>
                
                <div class="form-group">
                    <label for="linkedin_url">LinkedIn URL</label>
                    <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url') }}">
                </div>
                
                <div class="form-group">
                    <label for="sort_order">Sort Order</label>
                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                
                <div class="form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Create Team Member</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection