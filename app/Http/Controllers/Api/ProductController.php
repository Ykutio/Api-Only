<?php

namespace App\Http\Controllers\Api;

use App\Constants\SortDirection;
use App\Constants\StatusResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\ProductListRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductListRequest $request): JsonResponse
    {
        $perPage = $request->input('per_page', Product::PER_PAGE);
        $offset = $request->input('offset', 0);
        $sortField = $request->input('sort_field', 'id');
        $sortDirection = $request->input('sort_direction', SortDirection::ASC);

        $productCount = Product::productCount(true);

        $data = Product::getProductsList($request->getApiDTO());

        return response()->json([
            'status'         => StatusResponse::SUCCESS,
            'data'           => ProductResource::collection($data),
            'per_page'       => $perPage,
            'offset'         => $offset,
            'product_count'  => $productCount,
            'sort_field'     => $sortField,
            'sort_direction' => $sortDirection,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $product = Product::getProductById($id);
        if (empty($product)) {
            return response()->json([
                'status' => StatusResponse::ERROR,
            ]);
        }
        $data = new ProductResource($product);

        return response()->json([
            'status' => StatusResponse::SUCCESS,
            'data'   => $data,
        ]);
    }
}
