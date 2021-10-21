<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->orderBy('name');

        if (request()->has('s') and ! empty(request()->s)) {
            $keyword = request()->s;
            $attributes = implode(', ', (new Category)->getFillable());
            $categories = $categories
                ->whereRaw("(
                    CONCAT_WS(' ', {$attributes}) LIKE '%{$keyword}%'
                )");
        }

        $categories = $categories->paginate(20);

        return view('pages.categories.index', compact(
            'categories'
        ));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $period = Category::create($request->only(
            'name'
        ));

        return redirect()->route('categories.index')
            ->withStatus('Successfully added category.');
    }

    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact(
            'category'
        ));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->only(
            'name',
            'is_active',
        ));

        return redirect()->route('categories.index')
            ->withStatus('Successfully updated category.');
    }
}
