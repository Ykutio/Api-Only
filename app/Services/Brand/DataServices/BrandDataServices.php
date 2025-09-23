<?php

namespace App\Services\Brand\DataServices;

use App\Models\Brand\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandDataServices
{
    public function getBrandById(int $id): ?Brand
    {
        return Brand::where('id', $id)->first();
    }

    public function getAllBrands(): Collection
    {
        return Brand::all();
    }
}
