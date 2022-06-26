<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface 
{
    public function getAllTransactions() 
    {
        return Transaction::where('is_delete','=',0)->get();
    }

    public function getTransactionById($transactionId) 
    {
        return Transaction::where('is_delete','=',0)->findOrFail($transactionId)->member->detailTransactions;
    }

    public function deleteTransaction($productId, array $newDetails) 
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