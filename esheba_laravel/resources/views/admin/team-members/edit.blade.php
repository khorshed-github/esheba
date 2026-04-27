@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Team Member</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.team-members.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $teamMember->name) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $teamMember->position) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="4">{{ old('bio', $teamMember->bio) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="facebook_url">Facebook URL</label>
                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $teamMember->facebook_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="twitter_url">Twitter URL</label>
                    <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $teamMember->twitter_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="linkedin_url">LinkedIn URL</label>
                    <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="sort_order">Sort Order</label>
                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', $teamMember->sort_order) }}">
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($teamMember->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/team-members/' . $teamMember->image) }}" alt="{{ $teamMember->name }}" width="100">
                        </div>
                    @endif
                </div>
                
                <div class="form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Update Team Member</button>
                <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection