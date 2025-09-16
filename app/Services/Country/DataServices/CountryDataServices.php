<?php

namespace App\Services\Country\DataServices;

use App\Models\Country\Country;

class CountryDataServices
{
    public static function getCountryById(int $id): ?Country
    {
        return Country::where('id', $id)->first();
    }
}
