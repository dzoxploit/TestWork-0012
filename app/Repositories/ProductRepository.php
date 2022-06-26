<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements MemberRepositoryInterface 
{
    public function getAllProducts() 
    {
        return Product::where('is_delete','=',0)->get();
    }

    public function getProductById($productId) 
    {
        return Product::where('is_delete','=',0)->findOrFail($productId);
    }

    public function getProductByName($productName) 
    {
        return Product::where('is_delete','=',0)->where('name', 'LIKE', '%'. $productName . '%')->get();
    }

    public function deleteProduct($productId, array $newDetails) 
    {
        Product::where('id','=',$productId)->update($newDetails);
    }

    public function createProduct(array $productDetails) 
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $newDetails) 
    {
        return Product::where('is_delete','=',0)->whereId($productId)->update($newDetails);
    }

    public function getFulfilledProduct() 
    {
        return Product::where('status', true)->get();
    }
}