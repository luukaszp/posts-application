<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display form to add new category
     */
    public function create()
    {
        return view('categories.add_category');
    }
}
