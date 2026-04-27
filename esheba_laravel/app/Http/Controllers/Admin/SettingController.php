<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }
        return view('admin.settings.edit', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'about_company' => 'nullable|string'
        ]);

        $setting = new Setting();
        $setting->company_name = $request->company_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->facebook_url = $request->facebook_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->about_company = $request->about_company;
        $setting->save();

        return redirect()->route('admin.settings.index')
                         ->with('success', 'Settings saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'about_company' => 'nullable|string'
        ]);

        $setting = Setting::findOrFail($id);
        $setting->company_name = $request->company_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address = $request->address;
        $setting->facebook_url = $request->facebook_url;
        $setting->twitter_url = $request->twitter_url;
        $setting->linkedin_url = $request->linkedin_url;
        $setting->about_company = $request->about_company;
        $setting->save();

        return redirect()->route('admin.settings.index')
                         ->with('success', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}