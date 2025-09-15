<?php

namespace App\Models\Product\Enum;

class ProductSortOrderEnum
{
    const ID = 'id';
    const NAME = 'name';
    const PRICE = 'price';
    const QUANTITY = 'quantity';

    public static function getSortOrderMap(): array
    {
        return [
            self::ID,
            self::NAME,
            self::PRICE,
            self::QUANTITY,
        ];
    }
}
