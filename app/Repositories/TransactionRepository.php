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
        return Transaction::with('member', 'detailTransactions')->where('is_delete','=',0)->findOrFail($transactionId);
    }

    public function deleteTransaction($transactionId, array $newDetails) 
    {
        Transaction::where('id','=',$transactionId)->update($newDetails);
    }

    public function createTransaction(array $transactionDetails) 
    {
        return Transaction::create($transactionDetails);
    }

    public function updateTransaction($transactionId, array $newDetails) 
    {
        return Transaction::where('is_delete','=',0)->whereId($transactionId)->update($newDetails);
    }

    public function getFulfilledTransaction() 
    {
        return Transaction::with('member', 'detailTransactions')->where('status', true)->get();
    }
}