<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create($request->only([
            'name',
            'description',
            'parent_id',
            'is_active'
        ]));

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('is_delete', 0)
            ->where('id', '!=', $category->id)
            ->get();

        return view('category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        // ❌ Không cho chọn chính nó làm cha
        if ($request->parent_id == $category->id) {
            return back()->withErrors('Không thể chọn chính danh mục này làm cha');
        }

        // ❌ Không cho tạo vòng lặp
        if ($this->isDescendant($category, $request->parent_id)) {
            return back()->withErrors('Không thể chọn danh mục con/cháu làm cha');
        }

        $category->update($request->only([
            'name',
            'description',
            'parent_id',
            'is_active'
        ]));

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy(Category $category)
    {
        $category->update(['is_delete' => 1]);
        return redirect()->route('categories.index');
    }

    /**
     * Kiểm tra vòng lặp cha–con
     */
    private function isDescendant(Category $category, $parentId)
    {
        if (!$parentId) return false;

        $parent = Category::find($parentId);
        while ($parent) {
            if ($parent->id == $category->id) {
                return true;
            }
            $parent = $parent->parent;
        }
        return false;
    }
}
