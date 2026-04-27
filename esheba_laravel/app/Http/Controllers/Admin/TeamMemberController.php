<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers = TeamMember::orderBy('sort_order', 'asc')->get();
        return view('admin.team-members.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $teamMember = new TeamMember();
        $teamMember->name = $request->name;
        $teamMember->position = $request->position;
        $teamMember->bio = $request->bio;
        $teamMember->facebook_url = $request->facebook_url;
        $teamMember->twitter_url = $request->twitter_url;
        $teamMember->linkedin_url = $request->linkedin_url;
        $teamMember->sort_order = $request->sort_order ?? 0;
        $teamMember->is_active = $request->boolean('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $dir = public_path('team-members');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->move($dir, $imageName);
            $teamMember->image = 'team-members/' . $imageName;
        }

        $teamMember->save();

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Team member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('admin.team-members.show', compact('teamMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('admin.team-members.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $teamMember = TeamMember::findOrFail($id);
        $teamMember->name = $request->name;
        $teamMember->position = $request->position;
        $teamMember->bio = $request->bio;
        $teamMember->facebook_url = $request->facebook_url;
        $teamMember->twitter_url = $request->twitter_url;
        $teamMember->linkedin_url = $request->linkedin_url;
        $teamMember->sort_order = $request->sort_order ?? 0;
        $teamMember->is_active = $request->boolean('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            // Delete old image if exists (support stored with or without folder)
            if ($teamMember->image) {
                $oldPath = public_path($teamMember->image);
                $altPath = public_path('team-members/' . $teamMember->image);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                } elseif (file_exists($altPath) && is_file($altPath)) {
                    @unlink($altPath);
                }
            }

            $dir = public_path('team-members');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->move($dir, $imageName);
            $teamMember->image = 'team-members/' . $imageName;
        }

        $teamMember->save();

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teamMember = TeamMember::findOrFail($id);

        // Delete image if exists (support stored with or without folder)
        if ($teamMember->image) {
            $oldPath = public_path($teamMember->image);
            $altPath = public_path('team-members/' . $teamMember->image);
            if (file_exists($oldPath) && is_file($oldPath)) {
                @unlink($oldPath);
            } elseif (file_exists($altPath) && is_file($altPath)) {
                @unlink($altPath);
            }
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')
                         ->with('success', 'Team member deleted successfully.');
    }
}