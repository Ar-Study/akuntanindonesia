<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['categoryRel', 'authorRel']);

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->where(function ($q) use ($request) {
                $q->where('category', $request->input('category'))
                    ->orWhereHas('categoryRel', function ($cq) use ($request) {
                        $cq->where('name', $request->input('category'))
                            ->orWhere('slug', $request->input('category'));
                    });
            });
        }

        $articles = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $authors = Author::where('is_active', true)->orderBy('name')->get();

        $defaultAuthor = $authors->first();
        $defaultCategory = $categories->first();

        $article = new Article([
            'category_id' => $defaultCategory?->id,
            'category' => $defaultCategory?->name ?? 'Wawasan & Regulasi',
            'author_id' => $defaultAuthor?->id,
            'author' => $defaultAuthor?->name ?? 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA',
            'author_role' => $defaultAuthor?->role ?? 'Akuntan Berpraktek & Konsultan Pajak Berizin di Kementerian Keuangan',
            'read_time' => '5 menit baca',
            'is_published' => true,
        ]);

        return view('admin.articles.form', [
            'article' => $article,
            'categories' => $categories,
            'authors' => $authors,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'category_id' => 'nullable|exists:categories,id',
            'category' => 'nullable|string|max:100',
            'date_formatted' => 'nullable|string|max:50',
            'read_time' => 'required|string|max:50',
            'author_id' => 'nullable|exists:authors,id',
            'author' => 'nullable|string|max:150',
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

        // Resolve Category
        $categoryId = $validated['category_id'] ?? null;
        $categoryName = $validated['category'] ?? null;
        if ($categoryId && empty($categoryName)) {
            $cat = Category::find($categoryId);
            $categoryName = $cat?->name;
        } elseif (empty($categoryId) && ! empty($categoryName)) {
            $cat = Category::firstOrCreate(['name' => $categoryName], ['slug' => Str::slug($categoryName)]);
            $categoryId = $cat->id;
        }

        // Resolve Author
        $authorId = $validated['author_id'] ?? null;
        $authorName = $validated['author'] ?? null;
        $authorRole = $validated['author_role'] ?? null;
        if ($authorId) {
            $authModel = Author::find($authorId);
            if ($authModel) {
                $authorName = $authorName ?: $authModel->name;
                $authorRole = $authorRole ?: $authModel->role;
            }
        }

        $article = Article::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $categoryId,
            'category' => $categoryName ?: 'Wawasan & Regulasi',
            'date_formatted' => ! empty($validated['date_formatted']) ? $validated['date_formatted'] : now()->isoFormat('D MMMM Y'),
            'read_time' => $validated['read_time'],
            'author_id' => $authorId,
            'author' => $authorName ?: 'Hendra Setiyawan, M.Ak., Ak., BKP., CA., Asean CPA',
            'author_role' => $authorRole ?? 'Akuntan Berpraktek & Konsultan Pajak Berizin di Kementerian Keuangan',
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
        $categories = Category::orderBy('name')->get();
        $authors = Author::where('is_active', true)->orderBy('name')->get();

        return view('admin.articles.form', [
            'article' => $article,
            'categories' => $categories,
            'authors' => $authors,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug,'.$article->id,
            'category_id' => 'nullable|exists:categories,id',
            'category' => 'nullable|string|max:100',
            'date_formatted' => 'nullable|string|max:50',
            'read_time' => 'required|string|max:50',
            'author_id' => 'nullable|exists:authors,id',
            'author' => 'nullable|string|max:150',
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

        // Resolve Category
        $categoryId = $validated['category_id'] ?? $article->category_id;
        $categoryName = $validated['category'] ?? $article->category;
        if ($categoryId && empty($categoryName)) {
            $cat = Category::find($categoryId);
            $categoryName = $cat?->name;
        }

        // Resolve Author
        $authorId = $validated['author_id'] ?? $article->author_id;
        $authorName = $validated['author'] ?? $article->author;
        $authorRole = $validated['author_role'] ?? $article->author_role;
        if ($authorId && empty($authorName)) {
            $authModel = Author::find($authorId);
            if ($authModel) {
                $authorName = $authModel->name;
                $authorRole = $authorRole ?: $authModel->role;
            }
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $categoryId,
            'category' => $categoryName,
            'date_formatted' => ! empty($validated['date_formatted']) ? $validated['date_formatted'] : $article->date_formatted,
            'read_time' => $validated['read_time'],
            'author_id' => $authorId,
            'author' => $authorName,
            'author_role' => $authorRole ?? $article->author_role,
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
