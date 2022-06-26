<?php

namespace App\Interfaces;

interface DetailTransactionRepositoryInterface 
{
    public function getDetailTransactions();
    public function getDetailTransactionByTransactionId($transactionId);
    public function getDetailTransactionById($detailTransactionId);
    public function deleteDetailTransaction($detailTransactionId);
    public function createDetailTransaction(array $detailTransactionDetails);
    public function updateDetailTransaction($detailTransactionId, array $newDetails);
}