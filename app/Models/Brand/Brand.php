<?php

namespace App\Models\Brand;

use App\Models\Country\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Brand extends Model
{
    protected $fillable = ['name', 'country_id', 'status'];

    use HasFactory;


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public static function getBrandById(int $id): ?Brand
    {
        return Brand::where('id', $id)->first();
    }
}
