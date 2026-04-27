@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Team Member Details</h1>
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $teamMember->name }}</h5>
                    <p class="card-text"><strong>Position:</strong> {{ $teamMember->position }}</p>
                    
                    @if($teamMember->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/team-members/' . $teamMember->image) }}" alt="{{ $teamMember->name }}" class="img-fluid">
                        </div>
                    @endif
                    
                    <p class="card-text"><strong>Bio:</strong> {{ $teamMember->bio }}</p>
                    
                    @if($teamMember->facebook_url)
                        <p class="card-text"><strong>Facebook:</strong> <a href="{{ $teamMember->facebook_url }}" target="_blank">{{ $teamMember->facebook_url }}</a></p>
                    @endif
                    
                    @if($teamMember->twitter_url)
                        <p class="card-text"><strong>Twitter:</strong> <a href="{{ $teamMember->twitter_url }}" target="_blank">{{ $teamMember->twitter_url }}</a></p>
                    @endif
                    
                    @if($teamMember->linkedin_url)
                        <p class="card-text"><strong>LinkedIn:</strong> <a href="{{ $teamMember->linkedin_url }}" target="_blank">{{ $teamMember->linkedin_url }}</a></p>
                    @endif
                    
                    <p class="card-text"><strong>Sort Order:</strong> {{ $teamMember->sort_order }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ $teamMember->is_active ? 'Active' : 'Inactive' }}</p>
                    <p class="card-text"><strong>Created At:</strong> {{ $teamMember->created_at->format('M d, Y H:i') }}</p>
                    <p class="card-text"><strong>Updated At:</strong> {{ $teamMember->updated_at->format('M d, Y H:i') }}</p>
                    
                    <a href="{{ route('admin.team-members.edit', $teamMember->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection