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
        return Product::findOrFail($productId);
    }

    public function deleteProduct($productId) 
    {
        Product::destroy($productId);
    }

    public function createProduct(array $productDetails) 
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $newDetails) 
    {
        return Product::whereId($productId)->update($newDetails);
    }

    public function getFulfilledProduct() 
    {
        return Product::where('status', true);
    }
}