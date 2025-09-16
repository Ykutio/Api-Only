<?php

namespace App\Http\Controllers\Api;

use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryListResource;
use App\Models\Category\Category;
use App\Services\Category\DataServices\CategoryDataServices;
use Symfony\Component\HttpFoundation\JsonResponse;


class CategoryController extends Controller
{
    public function __construct(readonly CategoryDataServices $categoryDataServices)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => CategoryListResource::collection(Category::all()),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $category = $this->categoryDataServices->getCategoryById($id);

        if (empty($category)) {
            return response()->json([
                'status' => StatusResponse::ERROR,
            ]);
        }

        $data = new CategoryListResource($category);

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => $data,
        ]);
    }

}
