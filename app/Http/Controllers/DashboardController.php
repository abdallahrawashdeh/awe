<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\News;
use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Manual authentication check as fallback
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Set timezone to Amman
        $timezone = 'Asia/Amman';

        // Parse 'from' and 'to' dates
        $from = $request->input('from')
            ? Carbon::createFromFormat('Y-m-d', $request->input('from'), $timezone)->startOfDay()
            : null;

        $to = $request->input('to')
            ? Carbon::createFromFormat('Y-m-d', $request->input('to'), $timezone)->endOfDay()
            : null;

        // Get total counts (no date filtering)
        $careerTotal = Career::count();
        $newsTotal = News::count();
        $projectsTotal = Project::count();
        $serviceTotal = Service::count();
        $clientsTotal = Client::count();

        // Get filtered counts
        $careerQuery = Career::query();
        $newsQuery = News::query();
        $projectQuery = Project::query();
        $serviceQuery = Service::query();
        $clientQuery = Client::query();

        // Apply date filter if dates provided
        if ($from && $to) {
            $careerQuery->whereBetween('created_at', [$from, $to]);
            $newsQuery->whereBetween('created_at', [$from, $to]);
            $projectQuery->whereBetween('created_at', [$from, $to]);
            $serviceQuery->whereBetween('created_at', [$from, $to]);
            $clientQuery->whereBetween('created_at', [$from, $to]);
        }

        // Get counts
        $careerCount = $careerQuery->count();
        $newsCount = $newsQuery->count();
        $projectsCount = $projectQuery->count();
        $serviceCount = $serviceQuery->count();
        $clientsCount = $clientQuery->count();

        // Prepare data
        $data = [
            'careerTotal' => $careerTotal,
            'newsTotal' => $newsTotal,
            'projectsTotal' => $projectsTotal,
            'serviceTotal' => $serviceTotal,
            'clientsTotal' => $clientsTotal,
            'careerCount' => $careerCount,
            'newsCount' => $newsCount,
            'projectsCount' => $projectsCount,
            'serviceCount' => $serviceCount,
            'clientsCount' => $clientsCount,
            'from' => $request->input('from') ? $from->toDateString() : '',
            'to' => $request->input('to') ? $to->toDateString() : '',
        ];

        // AJAX response - SIMPLIFIED
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'careerCount' => $careerCount,
                'newsCount' => $newsCount,
                'projectsCount' => $projectsCount,
                'serviceCount' => $serviceCount,
                'clientsCount' => $clientsCount,
            ]);
        }

        // Regular view response
        return view('dashboard', $data);
    }
}
