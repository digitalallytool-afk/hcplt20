<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AmbassadorController;
use App\Http\Controllers\AssignTrialController;
use App\Http\Controllers\Auth\ForgotPasswordOtpController;
use App\Http\Controllers\Auth\PlayerRegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementMemberController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\MatchScheduleController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsArticleController;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\OwnerRegistrationController;
use App\Http\Controllers\PaymentWebhookController;
use App\Http\Controllers\Player\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationSliderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SponsorRegistrationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\WebSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/cms', [AdminController::class, 'cms'])->name('cms');
    Route::get('/league', [AdminController::class, 'league'])->name('league');
    Route::get('/trial', [AdminController::class, 'trial'])->name('trial');
    Route::get('/player', [AdminController::class, 'player'])->name('player');
    Route::post('/player/{id}/update', [AdminController::class, 'updatePlayer'])->name('admin.player.update');
    Route::get('/media', [MediaController::class, 'index'])->name('media.index');
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/media/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::post('/media/{id}/update', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/media/{id}', [MediaController::class, 'destroy'])->name('media.delete');
    Route::post('/media/{id}/toggle', [MediaController::class, 'toggleStatus'])->name('media.toggle');

    Route::get('/settings/web', [WebSettingController::class, 'edit'])->name('settings.web');
    Route::post('/settings/web', [WebSettingController::class, 'update'])->name('settings.web.update');

    // Slider Routes
    Route::get('/settings/sliders', [SliderController::class, 'index'])->name('settings.sliders');
    Route::post('/settings/sliders', [SliderController::class, 'store'])->name('settings.sliders.store');
    Route::get('/settings/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('settings.sliders.edit');
    Route::post('/settings/sliders/{slider}/update', [SliderController::class, 'update'])->name('settings.sliders.update');
    Route::delete('/settings/sliders/{slider}', [SliderController::class, 'destroy'])->name('settings.sliders.delete');
    Route::post('/settings/sliders/{slider}/toggle', [SliderController::class, 'toggleStatus'])->name('settings.sliders.toggle');

    // Trial Routes
    Route::get('/trials', [TrialController::class, 'index'])->name('trials.index');
    Route::post('/trials', [TrialController::class, 'store'])->name('trials.store');
    Route::get('/trials/{trial}/edit', [TrialController::class, 'edit'])->name('trials.edit');
    Route::post('/trials/{trial}/update', [TrialController::class, 'update'])->name('trials.update');
    Route::delete('/trials/{trial}', [TrialController::class, 'destroy'])->name('trials.delete');
    Route::post('/trials/{trial}/toggle', [TrialController::class, 'toggleStatus'])->name('trials.toggle');

    // Assign Trial Routes
    Route::get('/assign-trials', [AssignTrialController::class, 'index'])->name('assign_trials.index');
    Route::post('/assign-trials/get-districts', [AssignTrialController::class, 'getDistricts'])->name('assign_trials.get_districts');
    Route::post('/assign-trials/get-players', [AssignTrialController::class, 'getPlayers'])->name('assign_trials.get_players');
    Route::post('/assign-trials/assign', [AssignTrialController::class, 'assign'])->name('assign_trials.assign');
    Route::post('/assign-trials/unassign', [AssignTrialController::class, 'unassign'])->name('assign_trials.unassign');
    Route::post('/assign-trials/update-result', [AssignTrialController::class, 'updateResult'])->name('assign_trials.update_result');
    Route::get('/assign-trials/player/{id}/history', [AssignTrialController::class, 'playerHistory'])->name('assign_trials.history');

    // Match Routes
    Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
    Route::post('/matches', [MatchController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->name('matches.edit');
    Route::post('/matches/{match}/update', [MatchController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.delete');

    // Ambassador Routes
    Route::get('/ambassadors', [AmbassadorController::class, 'index'])->name('ambassadors.index');
    Route::post('/ambassadors', [AmbassadorController::class, 'store'])->name('ambassadors.store');
    Route::get('/ambassadors/{ambassador}/edit', [AmbassadorController::class, 'edit'])->name('ambassadors.edit');
    Route::post('/ambassadors/{ambassador}/update', [AmbassadorController::class, 'update'])->name('ambassadors.update');
    Route::delete('/ambassadors/{ambassador}', [AmbassadorController::class, 'destroy'])->name('ambassadors.delete');
    Route::post('/ambassadors/{ambassador}/toggle', [AmbassadorController::class, 'toggleStatus'])->name('ambassadors.toggle');

    // Team Routes
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/teams/{team}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::post('/teams/{team}/update', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.delete');
    Route::post('/teams/{team}/toggle', [TeamController::class, 'toggleStatus'])->name('teams.toggle');

    // News Category Routes
    Route::get('/news/categories', [NewsCategoryController::class, 'index'])->name('news.categories.index');
    Route::post('/news/categories', [NewsCategoryController::class, 'store'])->name('news.categories.store');
    Route::get('/news/categories/{id}/edit', [NewsCategoryController::class, 'edit'])->name('news.categories.edit');
    Route::post('/news/categories/{id}/update', [NewsCategoryController::class, 'update'])->name('news.categories.update');
    Route::delete('/news/categories/{id}', [NewsCategoryController::class, 'destroy'])->name('news.categories.delete');
    Route::post('/news/categories/{id}/toggle', [NewsCategoryController::class, 'toggleStatus'])->name('news.categories.toggle');

    // News Article Routes
    Route::get('/news/articles', [NewsArticleController::class, 'index'])->name('news.articles.index');
    Route::post('/news/articles', [NewsArticleController::class, 'store'])->name('news.articles.store');
    Route::get('/news/articles/{id}/edit', [NewsArticleController::class, 'edit'])->name('news.articles.edit');
    Route::post('/news/articles/{id}/update', [NewsArticleController::class, 'update'])->name('news.articles.update');
    Route::delete('/news/articles/{id}', [NewsArticleController::class, 'destroy'])->name('news.articles.delete');
    Route::post('/news/articles/{id}/toggle', [NewsArticleController::class, 'toggleStatus'])->name('news.articles.toggle');

    // Management Members
    Route::get('/management', [ManagementMemberController::class, 'index'])->name('management.index');
    Route::post('/management', [ManagementMemberController::class, 'store'])->name('management.store');
    Route::get('/management/{member}/edit', [ManagementMemberController::class, 'edit'])->name('management.edit');
    Route::post('/management/{member}/update', [ManagementMemberController::class, 'update'])->name('management.update');
    Route::delete('/management/{member}', [ManagementMemberController::class, 'destroy'])->name('management.destroy');
    Route::post('/management/{member}/toggle', [ManagementMemberController::class, 'toggleStatus'])->name('management.toggle');

    // Match Schedule
    Route::get('/matches', [MatchScheduleController::class, 'index'])->name('matches.index');
    Route::post('/matches', [MatchScheduleController::class, 'store'])->name('matches.store');
    Route::get('/matches/{match}/edit', [MatchScheduleController::class, 'edit'])->name('matches.edit');
    Route::post('/matches/{match}/update', [MatchScheduleController::class, 'update'])->name('matches.update');
    Route::delete('/matches/{match}', [MatchScheduleController::class, 'destroy'])->name('matches.destroy');

    // Registration Sliders
    Route::get('/registration-sliders', [RegistrationSliderController::class, 'index'])->name('registration-sliders.index');
    Route::post('/registration-sliders', [RegistrationSliderController::class, 'store'])->name('registration-sliders.store');
    Route::get('/registration-sliders/{slider}/edit', [RegistrationSliderController::class, 'edit'])->name('registration-sliders.edit');
    Route::post('/registration-sliders/{slider}/update', [RegistrationSliderController::class, 'update'])->name('registration-sliders.update');
    Route::delete('/registration-sliders/{slider}', [RegistrationSliderController::class, 'destroy'])->name('registration-sliders.destroy');
    Route::post('/registration-sliders/{slider}/toggle', [RegistrationSliderController::class, 'toggleStatus'])->name('registration-sliders.toggle');

    // Owner Leads
    Route::get('/owner-leads', [OwnerRegistrationController::class, 'index'])->name('owner-leads.index');
    Route::get('/owner-leads/{owner}', [OwnerRegistrationController::class, 'show'])->name('owner-leads.show');
    Route::post('/owner-leads/{owner}/update', [OwnerRegistrationController::class, 'updateStatus'])->name('owner-leads.update');
    Route::delete('/owner-leads/{owner}', [OwnerRegistrationController::class, 'destroy'])->name('owner-leads.destroy');

    // Sponsor Leads
    Route::get('/sponsor-leads', [SponsorRegistrationController::class, 'index'])->name('sponsor-leads.index');
    Route::get('/sponsor-leads/{sponsor}', [SponsorRegistrationController::class, 'show'])->name('sponsor-leads.show');
    Route::post('/sponsor-leads/{sponsor}/update', [SponsorRegistrationController::class, 'updateStatus'])->name('sponsor-leads.update');
    Route::delete('/sponsor-leads/{sponsor}', [SponsorRegistrationController::class, 'destroy'])->name('sponsor-leads.destroy');

    // Team Member Routes
    Route::get('/team-members', [TeamMemberController::class, 'index'])->name('team-members.index');
    Route::post('/team-members', [TeamMemberController::class, 'store'])->name('team-members.store');
    Route::get('/team-members/{member}/edit', [TeamMemberController::class, 'edit'])->name('team-members.edit');
    Route::post('/team-members/{member}/update', [TeamMemberController::class, 'update'])->name('team-members.update');
    Route::delete('/team-members/{member}', [TeamMemberController::class, 'destroy'])->name('team-members.destroy');
    Route::post('/team-members/{member}/toggle', [TeamMemberController::class, 'toggleStatus'])->name('team-members.toggle');

    // Contact Messages
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::patch('/contacts/{id}/update', [ContactController::class, 'updateStatus'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.delete');
});

// Public Routes
Route::get('/team/{id}', [HomeController::class, 'team_details'])->name('team.details');

// Public Owner Registration Route
Route::post('/owner-registration', [OwnerRegistrationController::class, 'store'])->name('owner.registration.store');
Route::post('/sponsor-registration', [SponsorRegistrationController::class, 'store'])->name('sponsor.registration.store');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/player-registration', [HomeController::class, 'player_registration'])->name('player-registration');
// Route::get('/player-registration', function () {
//     return '
//     <div style="
//         display:flex;
//         justify-content:center;
//         align-items:center;
//         height:100vh;
//         background:linear-gradient(135deg,#f8fafc,#e2e8f0);
//         font-family:Arial,sans-serif;
//     ">
//         <div style="
//             text-align:center;
//             background:#fff;
//             padding:40px;
//             border-radius:20px;
//             box-shadow:0 10px 30px rgba(0,0,0,0.1);
//             max-width:500px;
//         ">
//             <div style="font-size:70px;margin-bottom:20px;">🚧</div>
//             <h1 style="color:#1e293b;margin-bottom:15px;">
//                 Registration Process Under Maintenance
//             </h1>
//             <p style="color:#64748b;font-size:16px;line-height:1.6;">
//                 We are currently updating the registration process to provide you a better experience. <br>
//                 Please try again after some time. <br><br>
//                 Thank you for your patience.
//             </p>
//             <a href="/" style="
//                 display:inline-block;
//                 margin-top:20px;
//                 padding:12px 25px;
//                 background:#2563eb;
//                 color:#fff;
//                 text-decoration:none;
//                 border-radius:8px;
//             ">
//                 Go Back Home
//             </a>
//         </div>
//     </div>';
// })->name('player-registration');

Route::post('/player-registration/send-otp', [PlayerRegistrationController::class, 'sendOtp'])->name('player-registration.send-otp');
Route::post('/player-registration/resend-otp', [PlayerRegistrationController::class, 'resendOtp'])->name('player-registration.resend-otp');
Route::post('/player-registration/verify-otp', [PlayerRegistrationController::class, 'verifyOtp'])->name('player-registration.verify-otp');
Route::post('/player-registration/create-password', [PlayerRegistrationController::class, 'createPassword'])->name('player-registration.create-password');
Route::post('/razorpay/webhook', [PaymentWebhookController::class, 'handle'])->name('razorpay.webhook');

// OTP-Based Forgot Password
Route::get('/forgot-password-otp', [ForgotPasswordOtpController::class, 'showLinkRequestForm'])->name('forgot-password-otp');
Route::post('/forgot-password-otp/send-otp', [ForgotPasswordOtpController::class, 'sendOtp'])->name('forgot-password-otp.send-otp');
Route::post('/forgot-password-otp/resend-otp', [ForgotPasswordOtpController::class, 'resendOtp'])->name('forgot-password-otp.resend-otp');
Route::post('/forgot-password-otp/verify-otp', [ForgotPasswordOtpController::class, 'verifyOtp'])->name('forgot-password-otp.verify-otp');
Route::post('/forgot-password-otp/reset-password', [ForgotPasswordOtpController::class, 'resetPassword'])->name('forgot-password-otp.reset-password');

Route::middleware('auth')->group(function () {
    Route::get('/player/dashboard', [DashboardController::class, 'index'])->name('player.dashboard');
    Route::post('/player/profile/save', [App\Http\Controllers\Player\ProfileController::class, 'saveProfile'])->name('player.profile.save');
    Route::post('/player/profile/verify-payment', [App\Http\Controllers\Player\ProfileController::class, 'verifyPayment'])->name('player.profile.verify-payment');
});

Route::get('/owner-registration', [HomeController::class, 'owner_registration'])->name('owner-registration');

Route::get('/sponsor-registration', [HomeController::class, 'sponsor_registration'])->name('sponsor-registration');

Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/video', [HomeController::class, 'video'])->name('video');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [HomeController::class, 'terms'])->name('terms');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/sponsors', [HomeController::class, 'sponsors'])->name('sponsors');

require __DIR__.'/auth.php';
