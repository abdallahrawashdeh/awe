<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('user', 'images')->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function public() {
        $projects = Project::with('user', 'images')->latest()->get();
        return view('allprojects', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'year' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $validated['user_id'] = Auth::id();

        $project = Project::create($validated);

        // Handle image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('projects/' . $project->id, 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'alt_text' => $request->input('alt_texts.' . $index) ?? $project->title,
                    'order' => $index
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project) {
        $project->load('images', 'user');
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project) {
        $project->load('images');
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $validated = $request->validate([
            'year' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:project_images,id'
        ]);

        $project->update($validated);

        // Delete selected images
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = ProjectImage::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }
        }

        // Upload new images
        if ($request->hasFile('images')) {
            $currentOrder = $project->images()->count();
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('projects/' . $project->id, 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $path,
                    'alt_text' => $request->input('alt_texts.' . $index) ?? $project->title,
                    'order' => $currentOrder + $index
                ]);
            }
        }

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project) {
        // Delete all project images
        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    // Optional: Method to delete a single image
    public function deleteImage(Request $request, ProjectImage $image)
    {
        if ($request->user()->id !== $image->project->user_id) {
            abort(403);
        }

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
