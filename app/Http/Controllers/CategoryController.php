<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\CreateCategory;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display form to add new category
     */
    public function create()
    {
        return view('categories.add_category');
    }

    /**
     * Create a new category.
     */
    public function store(CreateCategory $request)
    {
        if ($request->validated()) {
            $result = $this->categoryService->add($request);
            return redirect('/categories/create');
        }
    }
}
