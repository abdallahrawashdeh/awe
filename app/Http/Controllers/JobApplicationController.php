<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of job applications (Admin).
     * Accessible at /applyedjobs
     */
    public function index(Request $request)
    {
        $query = JobApplication::query();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by search
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('career_title', 'like', '%' . $request->search . '%')
                  ->orWhere('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
            });
        }

        // Sort
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');
        $query->orderBy($sortField, $sortDirection);

        $applications = $query->paginate(10)->withQueryString();

        // Get status counts for stats
        $stats = [
            'total' => JobApplication::count(),
            'pending' => JobApplication::where('status', 'pending')->count(),
            'reviewed' => JobApplication::where('status', 'reviewed')->count(),
            'accepted' => JobApplication::where('status', 'accepted')->count(),
            'rejected' => JobApplication::where('status', 'rejected')->count(),
        ];

        return view('applyedjobs.index', compact('applications', 'stats'));
    }

    /**
     * Store a newly created job application.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'career_title' => 'required|string',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048', // 2MB max
            'message' => 'nullable|string'
        ]);

        // Handle file upload
        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9.]/', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('cvs', $fileName, 'public');
        }

        // Create job application record
        $application = JobApplication::create([
            'career_title' => $validated['career_title'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'cv_path' => $filePath ?? null,
            'message' => $validated['message'] ?? null,
            'status' => 'pending'
        ]);

        // Send email notification (optional)
        // Uncomment if you have created the mail class
        // Mail::to($application->email)->send(new ApplicationReceived($application));

        // Return success response
        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display the specified job application (Admin).
     */
    public function show(JobApplication $application)
    {
        return view('applyedjobs.show', compact('application'));
    }

    /**
     * Update the application status (Admin).
     */
    public function updateStatus(Request $request, JobApplication $application)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,rejected,accepted'
        ]);

        $application->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    /**
     * Download the CV file (Admin).
     */
public function downloadCv(JobApplication $application)
{
    if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
        // If view=inline is present, try to display inline
        if (request()->has('view') && request()->view == 'inline') {
            $path = Storage::disk('public')->path($application->cv_path);
            $content = file_get_contents($path);
            $mimeType = Storage::disk('public')->mimeType($application->cv_path);

            return response($content)
                ->header('Content-Type', $mimeType)
                ->header('Content-Disposition', 'inline; filename="' . basename($application->cv_path) . '"');
        }

        // Default: download
        return Storage::disk('public')->download($application->cv_path);
    }

    return redirect()->back()->with('error', 'CV file not found.');
}

    /**
     * Remove the specified job application (Admin).
     */
    public function destroy(JobApplication $application)
    {
        // Delete the CV file if it exists
        if ($application->cv_path && Storage::disk('public')->exists($application->cv_path)) {
            Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return redirect()->route('job.applications.index')
            ->with('success', 'Application deleted successfully!');
    }

    /**
     * Export applications to CSV (Optional Admin Feature).
     */
    public function export()
    {
        $applications = JobApplication::all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="applications_export_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function() use ($applications) {
            $file = fopen('php://output', 'w');

            // Add headers
            fputcsv($file, ['ID', 'Position', 'Name', 'Email', 'Phone', 'Status', 'Applied Date']);

            // Add data
            foreach ($applications as $app) {
                fputcsv($file, [
                    $app->id,
                    $app->career_title,
                    $app->name,
                    $app->email,
                    $app->phone,
                    $app->status,
                    $app->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
