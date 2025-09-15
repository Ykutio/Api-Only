<?php

namespace App\Models\Product;

use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\Country\Country;
use App\Models\Product\Enum\ProductStatusEnum;
use App\Services\Product\DTO\ProductApiDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    const PER_PAGE = 100;

    protected $fillable = [
        'name',
        'description',
        'img',
        'price',
        'brand_id',
        'category_id',
        'country_id',
        'quantity',
        'status',
    ];

    use HasFactory;

    public static function productCount(bool $isActive = false): int
    {
        $query = Product::query();

        if ($isActive) {
            $query->where('status', ProductStatusEnum::ACTIVE);
        }

        return $query->count();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public static function getProductsList(ProductApiDTO $productApiDTO): Collection
    {
        return Product::query()
            ->limit($productApiDTO->getPerPage())
            ->offset($productApiDTO->getOffset())
            ->orderBy($productApiDTO->getSortField(), $productApiDTO->getSortOrder())
            //->where('status', ProductStatusEnum::ACTIVE)
            ->get();
    }

    public static function getProductById(int $id): ?Product
    {
        return Product::where('id', $id)->first();
    }
}
