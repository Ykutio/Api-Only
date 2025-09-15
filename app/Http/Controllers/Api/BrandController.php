<?php

namespace App\Http\Controllers\Api;

use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Brand\BrandResource;
use App\Models\Brand\Brand;
use Symfony\Component\HttpFoundation\JsonResponse;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => BrandResource::collection(Brand::all()),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $brand = Brand::getBrandById($id);

        if (empty($brand)) {
            return response()->json([
                'status' => StatusResponse::ERROR,
            ]);
        }

        $data = new BrandResource($brand);

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => $data,
        ]);
    }

}
