<?php

namespace App\Http\Resources\Product;

use App\Constants\DataFormat;
use App\Http\Resources\Brand\BrandListResource;
use App\Http\Resources\Category\CategoryListResource;
use App\Http\Resources\Country\CountryListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->resource['id'],
            'name'        => $this->resource['name'],
            'description' => $this->resource['description'],
            'img'         => $this->resource['img'],
            'price'       => $this->resource['price'],
            'brand'       => BrandListResource::make($this->resource['brand']),
            'category'    => CategoryListResource::make($this->resource['category']),
            'country'     => CountryListResource::make($this->resource['country']),
            'quantity'    => $this->resource['quantity'],
            'status'      => $this->resource['status'],
            'created_at'  => $this->resource['created_at']->format(DataFormat::DATA_FORMAT),
        ];
    }
}
