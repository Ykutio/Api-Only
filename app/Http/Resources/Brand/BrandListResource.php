<?php

namespace App\Http\Resources\Brand;

use App\Constants\DataFormat;
use App\Http\Resources\Country\CountryListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'country'    => CountryListResource::make($this->country),
            'status'     => $this->status,
            'created_at' => $this->created_at->format(DataFormat::DATA_FORMAT),
        ];
    }
}
