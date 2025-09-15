<?php

namespace App\Constants;

class SortDirection
{
    const DESC = 'desc';
    const ASC = 'asc';

    public static function getSortOrderMap(): array
    {
        return [
            self::DESC => 'desc',
            self::ASC => 'asc'
        ];
    }
}
