<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\TotalInfoController;
use App\Http\Controllers\CeoInfoController;
use App\Models\News;
use App\Models\Service;
use App\Models\Project;
use App\Models\Client;
use App\Models\TotalInfo;
use App\Models\CeoInfo;
use Illuminate\Support\Facades\DB;

// ADMIN HOME
Route::get('/admin', function () {
    return view('welcome');
});

// PUBLIC HOME - Added CeoInfo to the existing route
Route::get('/', function () {
    $services = Service::with('user')->latest()->get();
    $news = News::with('user')->latest()->get();
    $projects = Project::with('user')->latest()->get();
    $clients = Client::with('user')->latest()->get();

    // GET CEO INFO
    $ceoInfo = CeoInfo::first();

    $totals = TotalInfo::select(
        DB::raw('SUM(total_cities) as total_cities'),
        DB::raw('SUM(total_countries) as total_countries'),
        DB::raw('SUM(total_employees) as total_employees'),
        DB::raw('SUM(total_clients) as total_clients'),
        DB::raw('SUM(total_projects) as total_projects')
    )->first();

    if (!$totals || $totals->total_cities === null) {
        $totals = (object) [
            'total_cities' => 0,
            'total_countries' => 0,
            'total_employees' => 0,
            'total_clients' => 0,
            'total_projects' => 0,
        ];
    }

    $lastUpdated = TotalInfo::latest()->first();

    return view('Index', compact('services', 'news', 'projects', 'clients', 'totals', 'lastUpdated', 'ceoInfo'));
});
// DASHBOARD (authenticated only)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// AUTHENTICATED ROUTES
Route::middleware('auth')->group(function () {
    // Projects routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Optional: Route for deleting a single image
    Route::delete('/project-images/{image}', [ProjectController::class, 'deleteImage'])->name('project-images.destroy');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Career routes
    Route::get('/careerss', [CareerController::class, 'index'])->name('careerss.index');
    Route::get('/careerss/create', [CareerController::class, 'create'])->name('careerss.create');
    Route::post('/careerss', [CareerController::class, 'store'])->name('careerss.store');
    Route::get('/careerss/{career}/edit', [CareerController::class, 'edit'])->name('careerss.edit');
    Route::put('/careerss/{career}', [CareerController::class, 'update'])->name('careerss.update');
    Route::delete('/careerss/{career}', [CareerController::class, 'destroy'])->name('careerss.destroy');

    // Service routes
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // News (CRUD) - using resource controller
    Route::resource('news', NewsController::class);

    // Clients routes
    Route::resource('clients', ClientController::class);

    // Total Info routes (CRUD with pop-up modals)
    Route::resource('totals', TotalInfoController::class);

    // CEO Management routes
    Route::get('/ceo', [CeoInfoController::class, 'index'])->name('ceo.index');
    Route::post('/ceo', [CeoInfoController::class, 'store'])->name('ceo.store');
    Route::put('/ceo/{ceoInfo}', [CeoInfoController::class, 'update'])->name('ceo.update');
    Route::delete('/ceo/{ceoInfo}', [CeoInfoController::class, 'destroy'])->name('ceo.destroy');
});

// PUBLIC ROUTES

// Public route for viewing news
Route::get('/allnews', [NewsController::class, 'public'])->name('public.news');

Route::get('/careers', [CareerController::class, 'public'])->name('careerss.news');

// Public route for viewing services via controller
Route::get('/allservices', [ServiceController::class, 'public'])->name('services.public');

Route::get('/allprojects', [ProjectController::class, 'public'])->name('projects.public');

// Contact routes
Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Team route
Route::get('/team', [TeamController::class, 'index']);

// Chatbot route
Route::get('/chatbot-response', [ChatbotController::class, 'getResponse'])->name('chatbot.response');

Route::get('/arabic', function () {
    return view('arabic');
});

use App\Http\Controllers\JobApplicationController;

Route::post('/careers/apply', [JobApplicationController::class, 'store'])->name('job.apply');

// Admin routes for job applications - accessible at /applyedjobs
Route::get('/applyedjobs', [JobApplicationController::class, 'index'])->name('job.applications.index');
Route::get('/applyedjobs/{application}', [JobApplicationController::class, 'show'])->name('job.applications.show');
Route::patch('/applyedjobs/{application}/status', [JobApplicationController::class, 'updateStatus'])->name('job.applications.status');
Route::get('/applyedjobs/{application}/download', [JobApplicationController::class, 'downloadCv'])->name('job.applications.download');
Route::delete('/applyedjobs/{application}', [JobApplicationController::class, 'destroy'])->name('job.applications.destroy');
Route::get('/applyedjobs/export/csv', [JobApplicationController::class, 'export'])->name('job.applications.export');


Route::get('/applyedjobs/{application}/download-cv', [JobApplicationController::class, 'downloadCv'])->name('job.applications.download-cv');

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
