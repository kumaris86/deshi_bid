<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $categories = Category::withCount(['products', 'activeProducts'])
            ->ordered()
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'order' => 'nullable|integer',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'icon' => $request->icon ?? 'fa-box',
            'order' => $request->order ?? 0,
            'is_active' => true,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'icon' => $request->icon,
            'order' => $request->order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category with existing products!');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }

    public function toggleStatus(Category $category)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $category->update(['is_active' => !$category->is_active]);

        return back()->with('success', 'Category status updated!');
    }
}