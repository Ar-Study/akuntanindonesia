<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::withCount('articles');

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $categories = $query->orderBy('name', 'asc')->paginate(15)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category;

        return view('admin.categories.form', [
            'category' => $category,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'slug' => 'nullable|string|max:100|unique:categories,slug',
            'description' => 'nullable|string|max:500',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', "Kategori '{$category->name}' berhasil ditambahkan.");
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', [
            'category' => $category,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,'.$category->id,
            'slug' => 'nullable|string|max:100|unique:categories,slug,'.$category->id,
            'description' => 'nullable|string|max:500',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        $category->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', "Kategori '{$category->name}' berhasil diperbarui.");
    }

    public function destroy(Category $category)
    {
        $name = $category->name;
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', "Kategori '{$name}' telah dihapus.");
    }
}
