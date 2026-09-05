<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Main Homepage Company Profile
Route::get('/', [ProfileController::class, 'index'])->name('home');

// Detail Placeholders / Anchors
Route::get('/layanan/{slug}', [ProfileController::class, 'serviceDetail'])->name('service.detail');
Route::get('/berita/{slug}', [ProfileController::class, 'articleDetail'])->name('article.detail');

// SEO Optimization Endpoints
Route::get('/sitemap.xml', [ProfileController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [ProfileController::class, 'robots'])->name('robots');

// Consultation Submission
Route::post('/api/konsultasi', [ProfileController::class, 'submitConsultation'])->name('api.consultation');
