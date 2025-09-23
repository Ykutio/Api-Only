<?php

namespace App\Services\Country\DataServices;

use App\Models\Country\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryDataServices
{
    public function getCountryById(int $id): ?Country
    {
        return Country::where('id', $id)->first();
    }

    public function getAllCountries(): Collection
    {
        return Country::all();
    }
}
