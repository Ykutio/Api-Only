<?php

namespace App\Services\Product\DataServices;

use App\Models\Product\Enum\ProductStatusEnum;
use App\Models\Product\Product;
use App\Services\Product\DTO\ProductApiDTO;
use Illuminate\Database\Eloquent\Collection;

class ProductDataServices
{
    public static function productCount(bool $isActive = false): int
    {
        $query = Product::query();

        if ($isActive) {
            $query->where('status', ProductStatusEnum::ACTIVE);
        }

        return $query->count();
    }

    public static function getActiveProductsListByQuery(ProductApiDTO $productApiDTO): Collection
    {
        return Product::query()
            ->limit($productApiDTO->getPerPage())
            ->offset($productApiDTO->getOffset())
            ->orderBy($productApiDTO->getSortField(), $productApiDTO->getSortOrder())
            ->where('status', ProductStatusEnum::ACTIVE)
            ->get();
    }

    public static function getProductById(int $id): ?Product
    {
        return Product::where('id', $id)->first();
    }
}
