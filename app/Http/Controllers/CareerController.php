<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    // Admin index - shows careers for management (careerss.index)
    public function index()
    {
        $careers = \App\Models\Career::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('careerss.index', compact('careers'));
    }

    // Public page - shows careers for job seekers (careers.public)
    public function public()
    {
        $careers = Career::latest()->get();
        return view('careers', compact('careers'));
    }

    public function dashboard()
    {
        $careerCount = Career::count();
        return view('dashboard', compact('careerCount'));
    }

    public function create()
    {
        return view('careerss.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'years_experience' => 'required|integer',
            'content' => 'required',
        ]);

        Career::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'years_experience' => $request->years_experience,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('careerss.index')->with('success', 'Career created.');
    }

    public function edit(Career $career)
    {
        return view('careerss.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'years_experience' => 'required|integer',
            'content' => 'required',
        ]);

        $career->update($request->all());

        return redirect()->route('careerss.index')->with('success', 'Career updated.');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('careerss.index')->with('success', 'Career deleted.');
    }
}
