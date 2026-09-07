<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Consultation;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_articles' => Article::count(),
            'published_articles' => Article::where('is_published', true)->count(),
            'total_consultations' => Consultation::count(),
            'new_consultations' => Consultation::where('status', 'baru')->count(),
            'total_services' => Service::count(),
            'total_faqs' => Faq::count(),
            'total_testimonials' => Testimonial::count(),
        ];

        $recentConsultations = Consultation::latest()->take(6)->get();
        $recentArticles = Article::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentConsultations', 'recentArticles'));
    }
}
