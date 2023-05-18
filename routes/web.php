<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RundownController;
use App\Http\Controllers\CareerfairController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobProposalController;
use App\Http\Controllers\QRCodeController;
use App\Models\Job_Proposal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/user/profile', [ProfileController::class, 'cv'])->name('profile.cv');
    Route::delete('/user/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('user/major/{id}', [ProfileController::class, 'getMajor'])->name('getMajor');
});

require __DIR__.'/auth.php';


Route::get('/', [FrontController::class, 'index'])->name('user-landing');
Route::get('/about', [FrontController::class, 'about'])->name('user-about');
Route::get('/partners', [FrontController::class, 'partner'])->name('user-partners');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::get('/singlepartner/{id}', [FrontController::class, 'singlepartner'])->name('user-singlepartner');
Route::get('/singlepartner/{partner}/job/{id}', [FrontController::class, 'jobdetails'])->name('jobdetails');
Route::get('/events', [FrontController::class, 'events'])->name('user-events');
Route::get('/events-detail/{id}', [FrontController::class, 'eventdetail'])->name('user-event-detail');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('user-gallery');
// Route::get('/loginuser/{id}', [FrontController::class, 'login'])->name('loginuser');
Route::get('/counter/{id}', [FrontController::class, 'counter']);
Route::get('/teams',[FrontController::class, 'team'])->name('teams');
Route::middleware(['auth','verified'])->group(function () {
    // route: user/dashboard
    Route::get('/user', [DashboardController::class, 'user'])->name('user-area')->middleware('user');
    Route::get('/user/applyjob', [JobApplicationController::class, 'index'])->name('jobApplication');
    Route::get('/user/viewcv', [JobApplicationController::class, 'viewcv'])->name('user-cv');
    Route::post('/user/applyjob', [JobApplicationController::class, 'store'])->name('applyjob');
    Route::get('/user/presence', [DashboardController::class, 'presence'])->name('presensi');
    Route::post('/user/presence', [DashboardController::class, 'presencestore'])->name('presensi-store');
    
    // route: company/dashboard
    Route::get('/company', [DashboardController::class, 'company'])->name('company-area');
    // route: job
    Route::get('/company/job', [CompanyJobController::class, 'index'])->name('company-job');
    Route::get('/company/jobapplication', [JobApplicationController::class, 'indexCompany'])->name('company-job-application');
    Route::post('/company/job', [CompanyJobController::class, 'store'])->name('company-job-store');
    Route::get('/company/job-new', [CompanyJobController::class, 'create'])->name('company-job-new');
    Route::get('/company/job-view/{job}', [CompanyJobController::class, 'show'])->name('company-job-view');
    Route::get('/company/job-update/{job}/edit', [CompanyJobController::class, 'edit'])->name('company-job-edit');
    Route::post('/company/job-update/{job}', [CompanyJobController::class, 'update'])->name('company-job-update');
    Route::delete('/company/job/delete', [CompanyJobController::class, 'destroy'])->name('company-job-delete');
    
    Route::get('/api/getviews',[DashboardController::class, 'getViews'])->name('company.views');

});

Route::middleware(['auth', 'verified','admin'])->group(function () {
    // route: admin/dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // route: admin/rundown
    Route::get('/dashboard/rundown', [RundownController::class, 'index'])->name('rundown');
    Route::post('/dashboard/rundown', [RundownController::class, 'store'])->name('rundown-store');
    Route::get('/dashboard/rundown-new', [RundownController::class, 'create'])->name('rundown-new');
    Route::get('/dashboard/rundown-view/{rundown}', [RundownController::class, 'show'])->name('rundown-view');
    Route::get('/dashboard/rundown-update/{rundown}/edit', [RundownController::class, 'edit'])->name('rundown-edit');
    Route::post('/dashboard/rundown-update/{rundown}', [RundownController::class, 'update'])->name('rundown-update');
    Route::delete('/dashboard/rundown/delete', [RundownController::class, 'destroy'])->name('rundown-delete');
    
    // route: admin/faq
    Route::get('/dashboard/faq', [FaqController::class, 'index'])->name('faq');
    Route::post('/dashboard/faq', [FaqController::class, 'store'])->name('faq-store');
    Route::get('/dashboard/faq-new', [FaqController::class, 'create'])->name('faq-new');
    Route::get('/dashboard/faq-view/{faq}', [FaqController::class, 'show'])->name('faq-view');
    Route::get('/dashboard/faq-update/{faq}/edit', [FaqController::class, 'edit'])->name('faq-edit');
    Route::post('/dashboard/faq-update/{faq}', [FaqController::class, 'update'])->name('faq-update');
    Route::delete('/dashboard/faq/delete', [FaqController::class, 'destroy'])->name('faq-delete');
    
    // route: admin/careerfair
    Route::get('/dashboard/career-fair', [CareerfairController::class, 'index'])->name('career');
    Route::get('/dashboard/career-fair-new', [CareerfairController::class, 'create'])->name('career-fair-new');
    Route::post('/dashboard/career-fair', [CareerfairController::class, 'store'])->name('career-fair-store');
    Route::get('/dashboard/career-fair-view/{id}', [CareerfairController::class, 'show'])->name('career-fair-view');
    Route::get('/dashboard/career-fair-update/{id}/edit', [CareerfairController::class, 'edit'])->name('career-fair-edit');
    Route::post('/dashboard/career-fair-update/{id}', [CareerfairController::class, 'update'])->name('career-fair-update');
    Route::delete('/dashboard/career-fair/delete', [CareerfairController::class, 'destroy'])->name('career-fair-delete');
    
    // route: admin/event
    Route::get('/dashboard/event', [EventController::class, 'index'])->name('event');
    Route::post('/dashboard/event', [EventController::class, 'store'])->name('event-store');
    Route::get('/dashboard/event-new', [EventController::class, 'create'])->name('event-new');
    Route::get('/dashboard/event-view/{event}', [EventController::class, 'show'])->name('event-view');
    Route::get('/dashboard/event-update/{event}/edit', [EventController::class, 'edit'])->name('event-edit');
    Route::post('/dashboard/event-update/{event}', [EventController::class, 'update'])->name('event-update');
    Route::delete('/dashboard/event/delete', [EventController::class, 'destroy'])->name('event-delete');
    
    // route: admin/gallery
    Route::get('/dashboard/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::post('/dashboard/gallery', [GalleryController::class, 'store'])->name('gallery-store');
    Route::get('/dashboard/gallery-new', [GalleryController::class, 'create'])->name('gallery-new');
    Route::get('/dashboard/gallery-view/{gallery}', [GalleryController::class, 'show'])->name('gallery-view');
    Route::get('/dashboard/gallery-update/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery-edit');
    Route::post('/dashboard/gallery-update/{gallery}', [GalleryController::class, 'update'])->name('gallery-update');
    Route::delete('/dashboard/gallery/delete', [GalleryController::class, 'destroy'])->name('gallery-delete');
    
    // route: admin/user
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user');
    Route::post('/dashboard/user', [UserController::class, 'store'])->name('user-store');
    Route::get('/dashboard/user-new', [UserController::class, 'create'])->name('user-new');
    Route::get('/dashboard/user-view/{user}', [UserController::class, 'show'])->name('user-view');
    Route::get('/dashboard/user-update/{user}/edit', [UserController::class, 'edit'])->name('user-edit');
    Route::post('/dashboard/user-update/{user}', [UserController::class, 'update'])->name('user-update');
    Route::delete('/dashboard/user/delete', [UserController::class, 'destroy'])->name('user-delete');

    // route: job
    Route::get('/dashboard/job', [JobController::class, 'index'])->name('job');
    Route::post('/dashboard/job', [JobController::class, 'store'])->name('job-store');
    Route::get('/dashboard/job-new', [JobController::class, 'create'])->name('job-new');
    Route::get('/dashboard/job-view/{job}', [JobController::class, 'show'])->name('job-view');
    Route::get('/dashboard/job-update/{job}/edit', [JobController::class, 'edit'])->name('job-edit');
    Route::post('/dashboard/job-update/{job}', [JobController::class, 'update'])->name('job-update');
    Route::delete('/dashboard/job/delete', [JobController::class, 'destroy'])->name('job-delete');

    // route: partner
    Route::get('/dashboard/partner', [PartnerController::class, 'index'])->name('partner');
    Route::get('/dashboard/partner/getPartners/', [PartnerController::class, "getPartners"])->name('partner.getPartners');
    Route::post('/dashboard/partner', [PartnerController::class, 'store'])->name('partner-store');
    Route::get('/dashboard/partner-new', [PartnerController::class, 'create'])->name('partner-new');
    Route::get('/dashboard/partner-view/{partner}', [PartnerController::class, 'show'])->name('partner-view');
    Route::get('/dashboard/partner-update/{partner}/edit', [PartnerController::class, 'edit'])->name('partner-edit');
    Route::post('/dashboard/partner-update/{partner}', [PartnerController::class, 'update'])->name('partner-update');
    Route::delete('/dashboard/partner/delete', [PartnerController::class, 'destroy'])->name('partner-delete');
    
    Route::get('dashboard/jobapplication', [JobApplicationController::class, 'indexAdmin'])->name('admin-jobapplication');
    Route::get('dashboard/presence', [DashboardController::class, 'indexAdmin'])->name('admin-presence');
   
    Route::get('/qrcode/{id}', [CareerfairController::class, 'viewQRCode'])->name('qrcode');
    Route::get('/downloadqrcode/{id}', [CareerfairController::class, 'downloadQRCode'])->name('qrcode-download');
    
    // current career fair
    Route::get('/api/getcurrentuseredu',[DashboardController::class, 'getCurrentUserEducation'])->name('current-user-edu');
    Route::get('/api/getcurrentjobedu',[DashboardController::class, 'getCurrentJobQualification'])->name('current-job-edu');

    // all time career fair
    Route::get('/api/getfullreport',[DashboardController::class, 'getFullReport'])->name('alltime-report');
    Route::get('/api/useredureport',[DashboardController::class, 'getUserEduReport'])->name('user-edu-report');
    Route::get('/api/jobedureport',[DashboardController::class, 'getJobEduReport'])->name('job-edu-report');
});
// end route: admin