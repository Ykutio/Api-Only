<?php

namespace App\Http\Controllers\Api;

use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryListResource;
use App\Models\Country\Country;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => CountryListResource::collection(Country::all()),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $country = Country::getCountryById($id);

        if (empty($country)) {
            return response()->json([
                'status' => StatusResponse::ERROR,
            ]);
        }

        $data = new CountryListResource($country);

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => $data,
        ]);
    }

}
