<?php

namespace App\Services\Brand\DataServices;

use App\Models\Brand\Brand;

class BrandDataServices
{
    public static function getBrandById(int $id): ?Brand
    {
        return Brand::where('id', $id)->first();
    }
}
