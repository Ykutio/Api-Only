<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Category extends Model
{
    const PAGE_LIMIT = 5;

    protected $fillable = ['name', 'status'];

    use HasFactory;

    public static function categoryCount(): int
    {
        return Category::all()
            ->count();
    }

    public static function categoriesByFilter(array $params = []): LengthAwarePaginator
    {
        $query = Category::query();

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        return $query->paginate(self::PAGE_LIMIT);
    }

    public static function getAllCategories(): Collection
    {
        return Category::orderBy('id', 'asc')->get();
    }

    public static function getCategoryById(int $id): ?Category
    {
        return Category::where('id', $id)->first();
    }
}
