<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->where('category', $request->input('category'));
        }

        $articles = $query->latest()->paginate(10)->withQueryString();
        $categories = Article::select('category')->distinct()->pluck('category');

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $article = new Article([
            'author' => 'Hendra Setiyawan, S.E., M.Ak., Ak., CA',
            'author_role' => 'Managing Partner & Kuasa Hukum Pengadilan Pajak',
            'category' => 'Wawasan & Regulasi',
            'read_time' => '5 menit baca',
            'is_published' => true,
        ]);

        return view('admin.articles.form', [
            'article' => $article,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'category' => 'required|string|max:100',
            'date_formatted' => 'nullable|string|max:50',
            'read_time' => 'required|string|max:50',
            'author' => 'required|string|max:150',
            'author_role' => 'nullable|string|max:150',
            'excerpt' => 'required|string|max:600',
            'highlights_text' => 'nullable|string',
            'content' => 'required|string',
            'tags_text' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        // Ensure uniqueness if collision
        $originalSlug = $slug;
        $counter = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $highlights = [];
        if (! empty($validated['highlights_text'])) {
            $lines = preg_split('/\r\n|\r|\n/', $validated['highlights_text']);
            $highlights = array_values(array_filter(array_map('trim', $lines)));
        }

        $tags = [];
        if (! empty($validated['tags_text'])) {
            $parts = explode(',', $validated['tags_text']);
            $tags = array_values(array_filter(array_map('trim', $parts)));
        }

        $article = Article::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'date_formatted' => ! empty($validated['date_formatted']) ? $validated['date_formatted'] : now()->isoFormat('D MMMM Y'),
            'read_time' => $validated['read_time'],
            'author' => $validated['author'],
            'author_role' => $validated['author_role'] ?? 'Senior Financial Advisory',
            'excerpt' => $validated['excerpt'],
            'highlights' => $highlights,
            'content' => $validated['content'],
            'tags' => $tags,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.articles.index')
            ->with('success', "Artikel '{$article->title}' berhasil ditambahkan.");
    }

    public function edit(Article $article)
    {
        return view('admin.articles.form', [
            'article' => $article,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug,'.$article->id,
            'category' => 'required|string|max:100',
            'date_formatted' => 'nullable|string|max:50',
            'read_time' => 'required|string|max:50',
            'author' => 'required|string|max:150',
            'author_role' => 'nullable|string|max:150',
            'excerpt' => 'required|string|max:600',
            'highlights_text' => 'nullable|string',
            'content' => 'required|string',
            'tags_text' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        $slug = ! empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $highlights = [];
        if (! empty($validated['highlights_text'])) {
            $lines = preg_split('/\r\n|\r|\n/', $validated['highlights_text']);
            $highlights = array_values(array_filter(array_map('trim', $lines)));
        }

        $tags = [];
        if (! empty($validated['tags_text'])) {
            $parts = explode(',', $validated['tags_text']);
            $tags = array_values(array_filter(array_map('trim', $parts)));
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'date_formatted' => ! empty($validated['date_formatted']) ? $validated['date_formatted'] : $article->date_formatted,
            'read_time' => $validated['read_time'],
            'author' => $validated['author'],
            'author_role' => $validated['author_role'] ?? $article->author_role,
            'excerpt' => $validated['excerpt'],
            'highlights' => $highlights,
            'content' => $validated['content'],
            'tags' => $tags,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.articles.index')
            ->with('success', "Artikel '{$article->title}' berhasil diperbarui.");
    }

    public function destroy(Article $article)
    {
        $title = $article->title;
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', "Artikel '{$title}' telah dihapus.");
    }

    public function togglePublish(Article $article)
    {
        $article->update([
            'is_published' => ! $article->is_published,
        ]);

        $status = $article->is_published ? 'dipublikasikan' : 'dijadikan draft';

        return back()->with('success', "Status artikel '{$article->title}' berhasil diubah menjadi {$status}.");
    }
}
