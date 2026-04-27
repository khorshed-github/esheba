@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Company Settings</h1>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ $setting->id ? route('admin.settings.update', $setting->id) : route('admin.settings.store') }}" method="POST">
                @csrf
                @if($setting->id)
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $setting->company_name) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $setting->email) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $setting->address) }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="facebook_url">Facebook URL</label>
                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" value="{{ old('facebook_url', $setting->facebook_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="twitter_url">Twitter URL</label>
                    <input type="url" class="form-control" id="twitter_url" name="twitter_url" value="{{ old('twitter_url', $setting->twitter_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="linkedin_url">LinkedIn URL</label>
                    <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                </div>
                
                <div class="form-group">
                    <label for="about_company">About Company</label>
                    <textarea class="form-control" id="about_company" name="about_company" rows="5">{{ old('about_company', $setting->about_company) }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    {{ $setting->id ? 'Update Settings' : 'Save Settings' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection