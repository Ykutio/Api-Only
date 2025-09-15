<?php

namespace App\Http\Requests\Api\Product;

use App\Constants\SortDirection;
use App\Http\Requests\MainRequest;
use App\Models\Product\Enum\ProductSortOrderEnum;
use App\Models\Product\Product;
use App\Services\Product\DTO\ProductApiDTO;
use Illuminate\Validation\Rule;

class ProductListRequest extends MainRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'per_page'       => ['sometimes', 'nullable', 'integer', 'min:1', 'max:' . Product::PER_PAGE],
            'offset'         => ['sometimes', 'nullable', 'integer', 'min:0'],
            'sort_field'     => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(ProductSortOrderEnum::getSortOrderMap()),
            ],
            'sort_direction' => [
                'sometimes',
                'nullable',
                'string',
                Rule::in(SortDirection::getSortOrderMap()),
            ],
        ];
    }

    public function getApiDTO(): ProductApiDTO
    {
        return new ProductApiDTO(
            $this->input('per_page', Product::PER_PAGE),
            $this->input('offset', 0),
            $this->input('sort_field', ProductSortOrderEnum::ID),
            $this->input('sort_direction', SortDirection::ASC)
        );
    }
}
