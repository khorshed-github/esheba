<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\TeamMember;
use App\Models\Setting;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->get();
        $portfolios = Portfolio::where('is_active', true)->orderBy('sort_order')->get();
        $teamMembers = TeamMember::where('is_active', true)->orderBy('sort_order')->get();
        $settings = Setting::first();
        
        return view('frontend.index', compact('services', 'portfolios', 'teamMembers', 'settings'));
    }
    
    public function packages()
    {
        $settings = Setting::first();
        return view('frontend.packages', compact('settings'));
    }
    
    public function domainHosting()
    {
        $settings = Setting::first();
        return view('frontend.domain-hosting', compact('settings'));
    }
    
    public function portfolio()
    {
        // Show all portfolios, not just active ones
        $portfolios = Portfolio::orderBy('sort_order')->get();
        $settings = Setting::first();
        
        return view('frontend.portfolio', compact('portfolios', 'settings'));
    }
    
    public function team()
    {
        // Show all team members, not just active ones
        $teamMembers = TeamMember::orderBy('sort_order')->get();
        $settings = Setting::first();
        
        return view('frontend.team', compact('teamMembers', 'settings'));
    }
    
    public function contact()
    {
        $settings = Setting::first();
        return view('frontend.contact', compact('settings'));
    }
    
    public function about()
    {
        $settings = Setting::first();
        return view('frontend.about', compact('settings'));
    }
    
    public function termsConditions()
    {
        $settings = Setting::first();
        return view('frontend.terms-conditions', compact('settings'));
    }
    
    public function privacyPolicy()
    {
        $settings = Setting::first();
        return view('frontend.privacy-policy', compact('settings'));
    }
}