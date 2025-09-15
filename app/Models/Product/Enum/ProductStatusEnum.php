<?php

namespace App\Models\Product\Enum;

enum ProductStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public static function getProductStatusMap(): array
    {
        return [
            self::ACTIVE->value   => 'Active',
            self::INACTIVE->value => 'Not Active',
        ];
    }
}
