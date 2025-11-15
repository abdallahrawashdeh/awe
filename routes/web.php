<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Models\News;
use App\Models\Service;
use App\Models\Project;
use App\Models\Client;





// ADMIN HOME
Route::get('/admin', function () {
    return view('welcome');
});



// PUBLIC HOME (displays Test.blade.php with both $services and $news)
Route::get('/', function () {
    $services = Service::with('user')->latest()->get();
    $news = News::with('user')->latest()->get();
    $projects = Project::with('user')->latest()->get();
    $clients = Client::with('user')->latest()->get();

    return view('Index', compact('services', 'news' , 'projects' , 'clients'));
});

// DASHBOARD (authenticated only)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// AUTHENTICATED ROUTES
Route::middleware('auth')->group(function () {

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


    // Projects routes

    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');



    // News (CRUD) - using resource controller
    Route::resource('news', NewsController::class);
});

// PUBLIC ROUTES

// Public route for viewing news
Route::get('/allnews', [NewsController::class, 'public'])->name('public.news');

Route::get('/careers', [CareerController::class, 'public'])->name('careerss.news');


// Public route for viewing services via controller
Route::get('/allservices', [ServiceController::class, 'public'])->name('services.public');

Route::get('/allprojects', [ProjectController::class, 'public'])->name('projects.public');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



use App\Http\Controllers\ClientController;

Route::middleware('auth')->group(function () {
    Route::resource('clients', ClientController::class);
});

use App\Http\Controllers\ContactController;

// Show contact form (GET)
Route::get('/contact', function () {
    return view('contact');
})->name('contact.form');

// Handle form submission (POST)
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');



use App\Http\Controllers\TeamController;



Route::get('/team', [TeamController::class, 'index']);



use App\Http\Controllers\ChatbotController;

Route::get('/chatbot-response', [ChatbotController::class, 'getResponse'])->name('chatbot.response');

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
