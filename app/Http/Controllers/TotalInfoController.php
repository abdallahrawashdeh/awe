<?php

namespace App\Http\Controllers;

use App\Models\TotalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TotalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totals = TotalInfo::with(['creator', 'updater'])->orderBy('id', 'desc')->get();
        return view('totals.index', compact('totals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('totals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total_cities' => 'required|integer|min:0',
            'total_countries' => 'required|integer|min:0',
            'total_employees' => 'required|integer|min:0',
            'total_clients' => 'required|integer|min:0',
            'total_projects' => 'required|integer|min:0',
        ]);

        $totalInfo = TotalInfo::create([
            'total_cities' => $request->total_cities,
            'total_countries' => $request->total_countries,
            'total_employees' => $request->total_employees,
            'total_clients' => $request->total_clients,
            'total_projects' => $request->total_projects,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Total info created successfully!',
            'data' => $totalInfo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $totalInfo = TotalInfo::findOrFail($id);
        return response()->json($totalInfo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $totalInfo = TotalInfo::findOrFail($id);
        return response()->json($totalInfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_cities' => 'required|integer|min:0',
            'total_countries' => 'required|integer|min:0',
            'total_employees' => 'required|integer|min:0',
            'total_clients' => 'required|integer|min:0',
            'total_projects' => 'required|integer|min:0',
        ]);

        $totalInfo = TotalInfo::findOrFail($id);
        $totalInfo->update([
            'total_cities' => $request->total_cities,
            'total_countries' => $request->total_countries,
            'total_employees' => $request->total_employees,
            'total_clients' => $request->total_clients,
            'total_projects' => $request->total_projects,
            'updated_by' => Auth::id(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Total info updated successfully!',
            'data' => $totalInfo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $totalInfo = TotalInfo::findOrFail($id);
        $totalInfo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Total info deleted successfully!'
        ]);
    }
}
