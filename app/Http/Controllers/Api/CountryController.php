<?php

namespace App\Http\Controllers\Api;

use App\Constants\ErrorResponse;
use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Country\CountryListResource;
use App\Services\Country\DataServices\CountryDataServices;
use Symfony\Component\HttpFoundation\JsonResponse;

class CountryController extends Controller
{

    public function __construct(readonly CountryDataServices $countryDataServices)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $countries = $this->countryDataServices->getAllCountries();

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data' => CountryListResource::collection($countries),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $country = $this->countryDataServices->getCountryById($id);

        if (empty($country)) {
            return response()->json([
                'status' => StatusResponse::ERROR,
                'message' => ErrorResponse::WRONG_PARAMS,
            ]);
        }

        $data = new CountryListResource($country);

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => $data,
        ]);
    }

}
