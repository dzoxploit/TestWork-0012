<?php

namespace App\Repositories;

use App\Interfaces\DetailTransactionRepositoryInterface;
use App\Models\Transaction;
use App\Models\DetailTransaction;

class DetailTransactionRepository implements DetailTransactionRepositoryInterface 
{
    public function getDetailTransactions() 
    {
        return DetailTransaction::where('is_delete','=',0)->get();
    }

    public function getTransactionByTransactionId($transactionId) 
    {
        return DetailTransaction::with('product')->where('is_delete','=',0)->where('transaction_id',$transactionId)->get();
    }

    public function getTransactionById($detailTransactionId) 
    {
        return DetailTransaction::with('product')->where('is_delete','=',0)->find($detailTransactionId);
    }

    public function deleteDetailTransaction($transactionId, array $newDetails) 
    {
        DetailTransaction::where('transaction_id','=',$transactionId)->update($newDetails);
    }

      public function deleteDetailTransaction2($detailTransactionId, array $newDetails) 
    {
        DetailTransaction::where('id','=',$detailTransactionId)->update($newDetails);
    }

    public function createDetailTransaction(array $detailTransactionDetails) 
    {
        return DetailTransaction::create($detailTransactionDetails);
    }

    public function updateDetailTransaction($detailTransactionId, array $newDetails) 
    {
        return DetailTransaction::where('is_delete','=',0)->whereId($detailTransactionId)->update($newDetails);
    }
}