<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $query = Author::withCount('articles');

        if ($request->filled('q')) {
            $search = trim($request->input('q'));
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('role', 'like', "%{$search}%")
                ->orWhere('bio', 'like', "%{$search}%");
        }

        $authors = $query->latest()->paginate(15)->withQueryString();

        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        $author = new Author([
            'is_active' => true,
        ]);

        return view('admin.authors.form', [
            'author' => $author,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'role' => 'nullable|string|max:150',
            'bio' => 'nullable|string|max:1000',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar_file')) {
            $avatarPath = $request->file('avatar_file')->store('authors', 'public');
        }

        $author = Author::create([
            'name' => $validated['name'],
            'role' => $validated['role'] ?? 'Akuntan & Konsultan Perpajakan Resmi',
            'bio' => $validated['bio'] ?? null,
            'avatar' => $avatarPath,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.authors.index')
            ->with('success', "Penulis '{$author->name}' berhasil ditambahkan.");
    }

    public function edit(Author $author)
    {
        return view('admin.authors.form', [
            'author' => $author,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'role' => 'nullable|string|max:150',
            'bio' => 'nullable|string|max:1000',
            'avatar_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'remove_avatar' => 'nullable|boolean',
            'email' => 'nullable|email|max:100',
            'phone' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean',
        ]);

        $avatarPath = $author->avatar;

        if ($request->boolean('remove_avatar')) {
            if ($author->avatar && ! str_starts_with($author->avatar, 'images/')) {
                Storage::disk('public')->delete($author->avatar);
            }
            $avatarPath = null;
        } elseif ($request->hasFile('avatar_file')) {
            if ($author->avatar && ! str_starts_with($author->avatar, 'images/')) {
                Storage::disk('public')->delete($author->avatar);
            }
            $avatarPath = $request->file('avatar_file')->store('authors', 'public');
        }

        $author->update([
            'name' => $validated['name'],
            'role' => $validated['role'] ?? 'Akuntan & Konsultan Perpajakan Resmi',
            'bio' => $validated['bio'] ?? null,
            'avatar' => $avatarPath,
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.authors.index')
            ->with('success', "Data penulis '{$author->name}' berhasil diperbarui.");
    }

    public function destroy(Author $author)
    {
        $name = $author->name;
        if ($author->avatar && ! str_starts_with($author->avatar, 'images/')) {
            Storage::disk('public')->delete($author->avatar);
        }
        $author->delete();

        return redirect()->route('admin.authors.index')
            ->with('success', "Penulis '{$name}' telah dihapus.");
    }
}
