<?php

namespace App\Http\Controllers;

use App\Models\CeoInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CeoInfoController extends Controller
{
    /**
     * Display CEO info on homepage
     */
    public function home()
    {
        $ceoInfo = CeoInfo::first();
        return view('home', compact('ceoInfo'));
    }

    /**
     * Display CEO management page
     */
    public function index()
    {
        $ceoInfo = CeoInfo::first();
        return view('ceo.index', compact('ceoInfo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'ceo_name' => 'required|string|max:255',
            'ceo_title' => 'required|string|max:255',
            'ceo_content' => 'required|string',
            'ceo_years' => 'required|integer|min:0',
            'ceo_projects' => 'required|integer|min:0',
            'ceo_client_satisfaction' => 'required|integer|min:0|max:100',
            'ceo_core_expertise' => 'required|string',
            'ceo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Check if CEO already exists
        if (CeoInfo::exists()) {
            return redirect()->route('ceo.index')->with('error', 'CEO information already exists. Please update instead.');
        }

        $data = $request->except('ceo_image');
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('ceo_image')) {
            $imagePath = $request->file('ceo_image')->store('ceo_images', 'public');
            $data['ceo_image'] = $imagePath;
        }

        CeoInfo::create($data);

        return redirect()->route('ceo.index')->with('success', 'CEO information created successfully!');
    }

    public function update(Request $request, CeoInfo $ceoInfo)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'ceo_name' => 'required|string|max:255',
            'ceo_title' => 'required|string|max:255',
            'ceo_content' => 'required|string',
            'ceo_years' => 'required|integer|min:0',
            'ceo_projects' => 'required|integer|min:0',
            'ceo_client_satisfaction' => 'required|integer|min:0|max:100',
            'ceo_core_expertise' => 'required|string',
            'ceo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->except('ceo_image');
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('ceo_image')) {
            // Delete old image
            if ($ceoInfo->ceo_image) {
                Storage::disk('public')->delete($ceoInfo->ceo_image);
            }
            $imagePath = $request->file('ceo_image')->store('ceo_images', 'public');
            $data['ceo_image'] = $imagePath;
        }

        $ceoInfo->update($data);

        return redirect()->route('ceo.index')->with('success', 'CEO information updated successfully!');
    }

    public function destroy(CeoInfo $ceoInfo)
    {
        if ($ceoInfo->ceo_image) {
            Storage::disk('public')->delete($ceoInfo->ceo_image);
        }
        $ceoInfo->delete();

        return redirect()->route('ceo.index')->with('success', 'CEO information deleted successfully!');
    }
}
