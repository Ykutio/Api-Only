<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Country extends Model
{
    const PAGE_LIMIT = 5;

    protected $fillable = ['name', 'status'];

    use HasFactory;

    public static function countryCount(): int
    {
        return Country::all()
            ->count();
    }

    public static function getAllCountriesPaginate(): LengthAwarePaginator
    {
        return Country::orderBy('id', 'asc')
            ->paginate(self::PAGE_LIMIT);
    }

    public static function countriesByFilter(array $params = []): LengthAwarePaginator
    {
        $query = Country::query();

        if (!empty($params['status'])) {
            $query->where('status', $params['status']);
        }

        return $query->paginate(self::PAGE_LIMIT);
    }

    public static function getAllCountries(): Collection
    {
        return Country::orderBy('id', 'asc')->get();
    }

    public static function getCountryById(int $id): ?Country
    {
        return Country::where('id', $id)->first();
    }
}
