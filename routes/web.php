<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Company Profile & Articles
Route::get('/', [ProfileController::class, 'index'])->name('home');
Route::get('/layanan/{slug}', [ProfileController::class, 'serviceDetail'])->name('service.detail');
Route::get('/berita', [ProfileController::class, 'articleIndex'])->name('article.index');
Route::get('/berita/{slug}', [ProfileController::class, 'articleDetail'])->name('article.detail');

// SEO Optimization Endpoints
Route::get('/sitemap.xml', [ProfileController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [ProfileController::class, 'robots'])->name('robots');

// Consultation Submission from Homepage
Route::post('/api/konsultasi', [ProfileController::class, 'submitConsultation'])->name('api.consultation');

// Secret Admin Portal (Known only to admin)
Route::prefix('portal-admin')->group(function () {
    // Guest Admin Auth Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    });

    // Authenticated Admin Protected Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

        // Dashboard Overview
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Articles, Categories & Authors CRUD
        Route::post('/articles/{article}/toggle', [AdminArticleController::class, 'togglePublish'])->name('admin.articles.toggle');
        Route::resource('articles', AdminArticleController::class)->names('admin.articles');
        Route::resource('categories', AdminCategoryController::class)->names('admin.categories');
        Route::resource('authors', AdminAuthorController::class)->names('admin.authors');

        // Consultation Leads Inbox
        Route::patch('/consultations/{consultation}/status', [AdminConsultationController::class, 'updateStatus'])->name('admin.consultations.status');
        Route::resource('consultations', AdminConsultationController::class)
            ->only(['index', 'show', 'destroy'])
            ->names('admin.consultations');

        // Services & Packages CRUD
        Route::resource('services', AdminServiceController::class)->names('admin.services');

        // FAQ CRUD
        Route::resource('faqs', AdminFaqController::class)->names('admin.faqs');

        // Testimonial CRUD
        Route::resource('testimonials', AdminTestimonialController::class)->names('admin.testimonials');

        // Website & Homepage Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');
    });
});
