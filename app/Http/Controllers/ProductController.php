<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller 
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->productRepository->getAllProducts()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/files');
        $request->image = $path;

        $request->is_delete = 0;
        $productDetails = $request->only([
            'name',
            'description',
            'price',
            'image',
            'stock',
            'status',
            'is_delete'
        ]);

        return response()->json(
            [
                'data' => $this->productRepository->createMember($productDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $productId = $request->route('id');

        return response()->json([
            'data' => $this->productRepository->getProductById($productId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $productId = $request->route('id');
        if($request->hasFile('image')){
                $name = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->store('public/files');
                $request->image = $path;
        }

          $productDetails = $request->only([
            'name',
            'description',
            'price',
            'image',
            'stock',
            'status',
            'is_delete'
        ]);

        return response()->json([
            'data' => $this->productRepository->updateProduct($productId, $productDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $productId = $request->route('id');
        $this->productRepository->deleteProduct($productId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}