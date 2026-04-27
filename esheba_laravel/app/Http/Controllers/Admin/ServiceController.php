<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $dir = public_path('services');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->move($dir, $imageName);
            $service->image = 'services/' . $imageName;
        }

        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            // Delete old image if exists (support stored with or without folder)
            if ($service->image) {
                $oldPath = public_path($service->image);
                $altPath = public_path('services/' . $service->image);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                } elseif (file_exists($altPath) && is_file($altPath)) {
                    @unlink($altPath);
                }
            }

            $dir = public_path('services');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->move($dir, $imageName);
            $service->image = 'services/' . $imageName;
        }

        $service->save();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // Delete image if exists (support stored with or without folder)
        if ($service->image) {
            $oldPath = public_path($service->image);
            $altPath = public_path('services/' . $service->image);
            if (file_exists($oldPath) && is_file($oldPath)) {
                @unlink($oldPath);
            } elseif (file_exists($altPath) && is_file($altPath)) {
                @unlink($altPath);
            }
        }

        $service->delete();

        return redirect()->route('admin.services.index')
                         ->with('success', 'Service deleted successfully.');
    }
}