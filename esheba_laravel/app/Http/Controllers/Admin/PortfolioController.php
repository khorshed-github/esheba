<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('sort_order', 'asc')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->website_url = $request->website_url;
        $portfolio->sort_order = $request->sort_order ?? 0;
        $portfolio->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $dir = public_path('portfolios');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->move($dir, $imageName);
            $portfolio->image = 'portfolios/' . $imageName;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sort_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->website_url = $request->website_url;
        $portfolio->sort_order = $request->sort_order ?? 0;
        $portfolio->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            // Delete old image if exists (support stored with or without folder)
            if ($portfolio->image) {
                $oldPath = public_path($portfolio->image);
                $altPath = public_path('portfolios/' . $portfolio->image);
                if (file_exists($oldPath) && is_file($oldPath)) {
                    @unlink($oldPath);
                } elseif (file_exists($altPath) && is_file($altPath)) {
                    @unlink($altPath);
                }
            }

            $dir = public_path('portfolios');
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }

            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->move($dir, $imageName);
            $portfolio->image = 'portfolios/' . $imageName;
        }

        $portfolio->save();

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Delete image if exists (support stored with or without folder)
        if ($portfolio->image) {
            $oldPath = public_path($portfolio->image);
            $altPath = public_path('portfolios/' . $portfolio->image);
            if (file_exists($oldPath) && is_file($oldPath)) {
                @unlink($oldPath);
            } elseif (file_exists($altPath) && is_file($altPath)) {
                @unlink($altPath);
            }
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio deleted successfully.');
    }
}