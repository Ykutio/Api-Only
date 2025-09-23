<?php

namespace App\Http\Controllers\Api;

use App\Constants\ErrorResponse;
use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Brand\BrandResource;
use App\Services\Brand\DataServices\BrandDataServices;
use Symfony\Component\HttpFoundation\JsonResponse;


class BrandController extends Controller
{
    public function __construct(readonly BrandDataServices $brandDataServices)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $brands = $this->brandDataServices->getAllBrands();

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data' => BrandResource::collection($brands),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $brand = $this->brandDataServices->getBrandById($id);

        if (empty($brand)) {
            return response()->json([
                'status' => StatusResponse::ERROR,
                'message' => ErrorResponse::WRONG_PARAMS,
            ]);
        }

        $data = new BrandResource($brand);

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => $data,
        ]);
    }

}
