<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebSettingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/cms', [AdminController::class, 'cms'])->name('cms');
    Route::get('/league', [AdminController::class, 'league'])->name('league');
    Route::get('/trial', [AdminController::class, 'trial'])->name('trial');
    Route::get('/player', [AdminController::class, 'player'])->name('player');
    Route::get('/media', [\App\Http\Controllers\MediaController::class, 'index'])->name('media.index');
    Route::post('/media', [\App\Http\Controllers\MediaController::class, 'store'])->name('media.store');
    Route::get('/media/{id}/edit', [\App\Http\Controllers\MediaController::class, 'edit'])->name('media.edit');
    Route::post('/media/{id}/update', [\App\Http\Controllers\MediaController::class, 'update'])->name('media.update');
    Route::delete('/media/{id}', [\App\Http\Controllers\MediaController::class, 'destroy'])->name('media.delete');
    Route::post('/media/{id}/toggle', [\App\Http\Controllers\MediaController::class, 'toggleStatus'])->name('media.toggle');
    
    Route::get('/settings/web', [WebSettingController::class, 'edit'])->name('settings.web');
    Route::post('/settings/web', [WebSettingController::class, 'update'])->name('settings.web.update');

    // Slider Routes
    Route::get('/settings/sliders', [\App\Http\Controllers\SliderController::class, 'index'])->name('settings.sliders');
    Route::post('/settings/sliders', [\App\Http\Controllers\SliderController::class, 'store'])->name('settings.sliders.store');
    Route::get('/settings/sliders/{slider}/edit', [\App\Http\Controllers\SliderController::class, 'edit'])->name('settings.sliders.edit');
    Route::post('/settings/sliders/{slider}/update', [\App\Http\Controllers\SliderController::class, 'update'])->name('settings.sliders.update');
    Route::delete('/settings/sliders/{slider}', [\App\Http\Controllers\SliderController::class, 'destroy'])->name('settings.sliders.delete');
    Route::post('/settings/sliders/{slider}/toggle', [\App\Http\Controllers\SliderController::class, 'toggleStatus'])->name('settings.sliders.toggle');

    // Trial Routes
    Route::get('/trials', [\App\Http\Controllers\TrialController::class, 'index'])->name('trials.index');
    Route::post('/trials', [\App\Http\Controllers\TrialController::class, 'store'])->name('trials.store');
    Route::get('/trials/{trial}/edit', [\App\Http\Controllers\TrialController::class, 'edit'])->name('trials.edit');
    Route::post('/trials/{trial}/update', [\App\Http\Controllers\TrialController::class, 'update'])->name('trials.update');
    Route::delete('/trials/{trial}', [\App\Http\Controllers\TrialController::class, 'destroy'])->name('trials.delete');
    Route::post('/trials/{trial}/toggle', [\App\Http\Controllers\TrialController::class, 'toggleStatus'])->name('trials.toggle');

    // Match Routes
    Route::get('/matches', [\App\Http\Controllers\MatchController::class, 'index'])->name('matches.index');
    Route::post('/matches', [\App\Http\Controllers\MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}/edit', [\App\Http\Controllers\MatchController::class, 'edit'])->name('matches.edit');
    Route::post('/matches/{match}/update', [\App\Http\Controllers\MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [\App\Http\Controllers\MatchController::class, 'destroy'])->name('matches.delete');

    // Ambassador Routes
    Route::get('/ambassadors', [\App\Http\Controllers\AmbassadorController::class, 'index'])->name('ambassadors.index');
    Route::post('/ambassadors', [\App\Http\Controllers\AmbassadorController::class, 'store'])->name('ambassadors.store');
    Route::get('/ambassadors/{ambassador}/edit', [\App\Http\Controllers\AmbassadorController::class, 'edit'])->name('ambassadors.edit');
    Route::post('/ambassadors/{ambassador}/update', [\App\Http\Controllers\AmbassadorController::class, 'update'])->name('ambassadors.update');
    Route::delete('/ambassadors/{ambassador}', [\App\Http\Controllers\AmbassadorController::class, 'destroy'])->name('ambassadors.delete');
    Route::post('/ambassadors/{ambassador}/toggle', [\App\Http\Controllers\AmbassadorController::class, 'toggleStatus'])->name('ambassadors.toggle');

    // Team Routes
    Route::get('/teams', [\App\Http\Controllers\TeamController::class, 'index'])->name('teams.index');
    Route::post('/teams', [\App\Http\Controllers\TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}/edit', [\App\Http\Controllers\TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/{team}/update', [\App\Http\Controllers\TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [\App\Http\Controllers\TeamController::class, 'destroy'])->name('teams.delete');
    Route::post('/teams/{team}/toggle', [\App\Http\Controllers\TeamController::class, 'toggleStatus'])->name('teams.toggle');

    // News Category Routes
    Route::get('/news/categories', [\App\Http\Controllers\NewsCategoryController::class, 'index'])->name('news.categories.index');
    Route::post('/news/categories', [\App\Http\Controllers\NewsCategoryController::class, 'store'])->name('news.categories.store');
    Route::get('/news/categories/{id}/edit', [\App\Http\Controllers\NewsCategoryController::class, 'edit'])->name('news.categories.edit');
    Route::post('/news/categories/{id}/update', [\App\Http\Controllers\NewsCategoryController::class, 'update'])->name('news.categories.update');
    Route::delete('/news/categories/{id}', [\App\Http\Controllers\NewsCategoryController::class, 'destroy'])->name('news.categories.delete');
    Route::post('/news/categories/{id}/toggle', [\App\Http\Controllers\NewsCategoryController::class, 'toggleStatus'])->name('news.categories.toggle');

    // News Article Routes
    Route::get('/news/articles', [\App\Http\Controllers\NewsArticleController::class, 'index'])->name('news.articles.index');
    Route::post('/news/articles', [\App\Http\Controllers\NewsArticleController::class, 'store'])->name('news.articles.store');
    Route::get('/news/articles/{id}/edit', [\App\Http\Controllers\NewsArticleController::class, 'edit'])->name('news.articles.edit');
    Route::post('/news/articles/{id}/update', [\App\Http\Controllers\NewsArticleController::class, 'update'])->name('news.articles.update');
    Route::delete('/news/articles/{id}', [\App\Http\Controllers\NewsArticleController::class, 'destroy'])->name('news.articles.delete');
    Route::post('/news/articles/{id}/toggle', [\App\Http\Controllers\NewsArticleController::class, 'toggleStatus'])->name('news.articles.toggle');



    // Management Members
    Route::get('/management', [\App\Http\Controllers\ManagementMemberController::class, 'index'])->name('management.index');
    Route::post('/management', [\App\Http\Controllers\ManagementMemberController::class, 'store'])->name('management.store');
    Route::get('/management/{member}/edit', [\App\Http\Controllers\ManagementMemberController::class, 'edit'])->name('management.edit');
    Route::post('/management/{member}/update', [\App\Http\Controllers\ManagementMemberController::class, 'update'])->name('management.update');
    Route::delete('/management/{member}', [\App\Http\Controllers\ManagementMemberController::class, 'destroy'])->name('management.destroy');
    Route::post('/management/{member}/toggle', [\App\Http\Controllers\ManagementMemberController::class, 'toggleStatus'])->name('management.toggle');

    // Match Schedule
    Route::get('/matches', [\App\Http\Controllers\MatchScheduleController::class, 'index'])->name('matches.index');
    Route::post('/matches', [\App\Http\Controllers\MatchScheduleController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}/edit', [\App\Http\Controllers\MatchScheduleController::class, 'edit'])->name('matches.edit');
    Route::post('/matches/{match}/update', [\App\Http\Controllers\MatchScheduleController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [\App\Http\Controllers\MatchScheduleController::class, 'destroy'])->name('matches.destroy');

    // Registration Sliders
    Route::get('/registration-sliders', [\App\Http\Controllers\RegistrationSliderController::class, 'index'])->name('registration-sliders.index');
    Route::post('/registration-sliders', [\App\Http\Controllers\RegistrationSliderController::class, 'store'])->name('registration-sliders.store');
    Route::get('/registration-sliders/{slider}/edit', [\App\Http\Controllers\RegistrationSliderController::class, 'edit'])->name('registration-sliders.edit');
    Route::post('/registration-sliders/{slider}/update', [\App\Http\Controllers\RegistrationSliderController::class, 'update'])->name('registration-sliders.update');
    Route::delete('/registration-sliders/{slider}', [\App\Http\Controllers\RegistrationSliderController::class, 'destroy'])->name('registration-sliders.destroy');
    Route::post('/registration-sliders/{slider}/toggle', [\App\Http\Controllers\RegistrationSliderController::class, 'toggleStatus'])->name('registration-sliders.toggle');

    // Owner Leads
    Route::get('/owner-leads', [\App\Http\Controllers\OwnerRegistrationController::class, 'index'])->name('owner-leads.index');
    Route::get('/owner-leads/{owner}', [\App\Http\Controllers\OwnerRegistrationController::class, 'show'])->name('owner-leads.show');
    Route::post('/owner-leads/{owner}/update', [\App\Http\Controllers\OwnerRegistrationController::class, 'updateStatus'])->name('owner-leads.update');
    Route::delete('/owner-leads/{owner}', [\App\Http\Controllers\OwnerRegistrationController::class, 'destroy'])->name('owner-leads.destroy');

    // Sponsor Leads
    Route::get('/sponsor-leads', [\App\Http\Controllers\SponsorRegistrationController::class, 'index'])->name('sponsor-leads.index');
    Route::get('/sponsor-leads/{sponsor}', [\App\Http\Controllers\SponsorRegistrationController::class, 'show'])->name('sponsor-leads.show');
    Route::post('/sponsor-leads/{sponsor}/update', [\App\Http\Controllers\SponsorRegistrationController::class, 'updateStatus'])->name('sponsor-leads.update');
    Route::delete('/sponsor-leads/{sponsor}', [\App\Http\Controllers\SponsorRegistrationController::class, 'destroy'])->name('sponsor-leads.destroy');

    // Team Member Routes
    Route::get('/team-members', [\App\Http\Controllers\TeamMemberController::class, 'index'])->name('team-members.index');
    Route::post('/team-members', [\App\Http\Controllers\TeamMemberController::class, 'store'])->name('team-members.store');
    Route::get('/team-members/{member}/edit', [\App\Http\Controllers\TeamMemberController::class, 'edit'])->name('team-members.edit');
    Route::post('/team-members/{member}/update', [\App\Http\Controllers\TeamMemberController::class, 'update'])->name('team-members.update');
    Route::delete('/team-members/{member}', [\App\Http\Controllers\TeamMemberController::class, 'destroy'])->name('team-members.destroy');
    Route::post('/team-members/{member}/toggle', [\App\Http\Controllers\TeamMemberController::class, 'toggleStatus'])->name('team-members.toggle');

    // Contact Messages
    Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [\App\Http\Controllers\ContactController::class, 'show'])->name('contacts.show');
    Route::patch('/contacts/{id}/update', [\App\Http\Controllers\ContactController::class, 'updateStatus'])->name('contacts.update');
    Route::delete('/contacts/{id}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.delete');
});

// Public Routes
Route::get('/team/{id}', [HomeController::class, 'team_details'])->name('team.details');

// Public Owner Registration Route
Route::post('/owner-registration', [\App\Http\Controllers\OwnerRegistrationController::class, 'store'])->name('owner.registration.store');
Route::post('/sponsor-registration', [\App\Http\Controllers\SponsorRegistrationController::class, 'store'])->name('sponsor.registration.store');
Route::post('/contact/submit', [\App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');




Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/player-registration', [HomeController::class, 'player_registration'])->name('player-registration');

Route::get('/owner-registration', [HomeController::class, 'owner_registration'])->name('owner-registration');

Route::get('/sponsor-registration', [HomeController::class, 'sponsor_registration'])->name('sponsor-registration');

Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/video', [HomeController::class, 'video'])->name('video');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('terms');





require __DIR__.'/auth.php';
