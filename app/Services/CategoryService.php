<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * Create new category.
     */
    public function add($data)
    {
        $category = new Category();
        $category->name = $data->name;
        $category->save();

        return $category;
    }
}
