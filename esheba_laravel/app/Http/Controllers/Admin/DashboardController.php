<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = Service::count();
        $portfoliosCount = Portfolio::count();
        $teamMembersCount = TeamMember::count();
        
        return view('admin.dashboard', compact('servicesCount', 'portfoliosCount', 'teamMembersCount'));
    }
}