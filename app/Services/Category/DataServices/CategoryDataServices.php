<?php

namespace App\Services\Category\DataServices;

use App\Models\Category\Category;

class CategoryDataServices
{
    public static function getCategoryById(int $id): ?Category
    {
        return Category::where('id', $id)->first();
    }
}
