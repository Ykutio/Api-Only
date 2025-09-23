<?php

namespace App\Services\Category\DataServices;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryDataServices
{
    public function getCategoryById(int $id): ?Category
    {
        return Category::where('id', $id)->first();
    }

    public function getAllCategories(): Collection
    {
        return Category::all();
    }
}
