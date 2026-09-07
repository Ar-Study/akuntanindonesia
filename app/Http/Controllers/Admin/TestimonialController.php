<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $testimonial = new Testimonial([
            'rating' => 5,
            'is_active' => true,
            'sort_order' => Testimonial::max('sort_order') + 1,
        ]);

        return view('admin.testimonials.form', [
            'testimonial' => $testimonial,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'company' => 'nullable|string|max:150',
            'role' => 'nullable|string|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1500',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        Testimonial::create([
            'client_name' => $validated['client_name'],
            'company' => $validated['company'],
            'role' => $validated['role'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'is_active' => $request->has('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimoni dari '{$validated['client_name']}' berhasil ditambahkan.");
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', [
            'testimonial' => $testimonial,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'company' => 'nullable|string|max:150',
            'role' => 'nullable|string|max:150',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1500',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $testimonial->update([
            'client_name' => $validated['client_name'],
            'company' => $validated['company'],
            'role' => $validated['role'],
            'rating' => $validated['rating'],
            'review' => $validated['review'],
            'is_active' => $request->has('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimoni dari '{$testimonial->client_name}' berhasil diperbarui.");
    }

    public function destroy(Testimonial $testimonial)
    {
        $name = $testimonial->client_name;
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', "Testimoni dari '{$name}' telah dihapus.");
    }
}
