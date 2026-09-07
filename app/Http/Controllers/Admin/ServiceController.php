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
            'sort_order' => Service::max('sort_order') + 1,
            'is_featured' => false,
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
            'badge' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string|max:500',
            'price_note' => 'nullable|string|max:100',
            'features_text' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $features = [];
        if (! empty($validated['features_text'])) {
            $lines = preg_split('/\r\n|\r|\n/', $validated['features_text']);
            $features = array_values(array_filter(array_map('trim', $lines)));
        }

        Service::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'badge' => $validated['badge'],
            'subtitle' => $validated['subtitle'],
            'price_note' => $validated['price_note'],
            'features' => $features,
            'is_featured' => $request->has('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', "Paket layanan '{$validated['title']}' berhasil ditambahkan.");
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
            'badge' => 'nullable|string|max:100',
            'subtitle' => 'nullable|string|max:500',
            'price_note' => 'nullable|string|max:100',
            'features_text' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $features = [];
        if (! empty($validated['features_text'])) {
            $lines = preg_split('/\r\n|\r|\n/', $validated['features_text']);
            $features = array_values(array_filter(array_map('trim', $lines)));
        }

        $service->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'badge' => $validated['badge'],
            'subtitle' => $validated['subtitle'],
            'price_note' => $validated['price_note'],
            'features' => $features,
            'is_featured' => $request->has('is_featured'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.services.index')
            ->with('success', "Paket layanan '{$service->title}' berhasil diperbarui.");
    }

    public function destroy(Service $service)
    {
        $title = $service->title;
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', "Paket layanan '{$title}' telah dihapus.");
    }
}
