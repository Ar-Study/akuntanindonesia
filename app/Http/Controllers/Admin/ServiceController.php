<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order', 'asc')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $service = new Service([
            'sort_order' => (Service::max('sort_order') ?? 0) + 1,
            'is_featured' => false,
            'is_active' => true,
            'color' => 'ruby',
            'category' => 'pembukuan',
            'category_label' => 'Pembukuan & Laporan',
            'icon' => '📊',
        ]);

        return view('admin.services.form', [
            'service' => $service,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'category' => 'nullable|string|in:pembukuan,pajak,manajemen,sistem',
            'category_label' => 'nullable|string|max:100',
            'badge' => 'nullable|string|max:100',
            'color' => 'nullable|string|in:ruby,indigo,gold,emerald,cyan,violet',
            'icon' => 'nullable|string|max:20',
            'subtitle' => 'nullable|string|max:1500',
            'desc' => 'nullable|string|max:2500',
            'price_note' => 'nullable|string|max:100',
            'features_text' => 'nullable|string',
            'points_text' => 'nullable|string',
            'mascot_tip' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $category = $validated['category'] ?? 'pembukuan';
        $categoryLabels = [
            'pembukuan' => 'Pembukuan & Laporan',
            'pajak' => 'Pajak & Litigasi',
            'manajemen' => 'Manajemen & GCG',
            'sistem' => 'Sistem Cloud',
        ];
        $categoryLabel = ! empty($validated['category_label']) ? $validated['category_label'] : ($categoryLabels[$category] ?? ucfirst($category));

        $desc = ! empty($validated['desc']) ? $validated['desc'] : ($validated['subtitle'] ?? $validated['title']);

        $pointsText = ! empty($validated['points_text']) ? $validated['points_text'] : ($validated['features_text'] ?? '');
        $points = [];
        if (! empty($pointsText)) {
            $lines = preg_split('/\r\n|\r|\n/', $pointsText);
            $points = array_values(array_filter(array_map('trim', $lines)));
        }

        Service::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $category,
            'category_label' => $categoryLabel,
            'badge' => $validated['badge'] ?? null,
            'color' => $validated['color'] ?? 'ruby',
            'icon' => ! empty($validated['icon']) ? $validated['icon'] : '📊',
            'subtitle' => Str::limit($desc, 250),
            'desc' => $desc,
            'price_note' => $validated['price_note'] ?? null,
            'points' => $points,
            'features' => $points,
            'mascot_tip' => $validated['mascot_tip'] ?? null,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active') || ! $request->has('points_text'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', "Layanan '{$validated['title']}' berhasil ditambahkan ke halaman depan.");
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', [
            'service' => $service,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,'.$service->id,
            'category' => 'nullable|string|in:pembukuan,pajak,manajemen,sistem',
            'category_label' => 'nullable|string|max:100',
            'badge' => 'nullable|string|max:100',
            'color' => 'nullable|string|in:ruby,indigo,gold,emerald,cyan,violet',
            'icon' => 'nullable|string|max:20',
            'subtitle' => 'nullable|string|max:1500',
            'desc' => 'nullable|string|max:2500',
            'price_note' => 'nullable|string|max:100',
            'features_text' => 'nullable|string',
            'points_text' => 'nullable|string',
            'mascot_tip' => 'nullable|string|max:255',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $category = $validated['category'] ?? ($service->category ?: 'pembukuan');
        $categoryLabels = [
            'pembukuan' => 'Pembukuan & Laporan',
            'pajak' => 'Pajak & Litigasi',
            'manajemen' => 'Manajemen & GCG',
            'sistem' => 'Sistem Cloud',
        ];
        $categoryLabel = ! empty($validated['category_label']) ? $validated['category_label'] : ($categoryLabels[$category] ?? ucfirst($category));

        $desc = ! empty($validated['desc']) ? $validated['desc'] : ($validated['subtitle'] ?? ($service->desc ?: $service->subtitle));

        $pointsText = ! empty($validated['points_text']) ? $validated['points_text'] : ($validated['features_text'] ?? null);
        $points = $service->effective_points;
        if ($pointsText !== null) {
            $lines = preg_split('/\r\n|\r|\n/', $pointsText);
            $points = array_values(array_filter(array_map('trim', $lines)));
        }

        $service->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $category,
            'category_label' => $categoryLabel,
            'badge' => $validated['badge'] ?? null,
            'color' => $validated['color'] ?? ($service->color ?: 'ruby'),
            'icon' => ! empty($validated['icon']) ? $validated['icon'] : ($service->icon ?: '📊'),
            'subtitle' => Str::limit($desc, 250),
            'desc' => $desc,
            'price_note' => $validated['price_note'] ?? $service->price_note,
            'points' => $points,
            'features' => $points,
            'mascot_tip' => $validated['mascot_tip'] ?? $service->mascot_tip,
            'is_featured' => $request->has('is_featured'),
            'is_active' => $request->has('is_active') ? true : ($request->has('title') && ! $request->has('points_text') ? $service->is_active : false),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', "Layanan '{$service->title}' berhasil diperbarui.");
    }

    public function destroy(Service $service)
    {
        $title = $service->title;
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', "Layanan '{$title}' telah dihapus.");
    }
}
