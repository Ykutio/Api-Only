<?php

namespace App\Http\Resources\Product;

use App\Constants\DataFormat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->resource['id'],
            'name'       => $this->resource['name'],
            'status'     => $this->resource['status'],
            'created_at' => $this->resource['created_at']->format(DataFormat::DATA_FORMAT),
        ];
    }
}
