<?php

namespace App\Http\Controllers;

use App\Interfaces\DetailTransactionRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetailTransactionController extends Controller 
{
    private DetailTransactionRepositoryInterface $detailtransactionRepository;

    public function __construct(DetailTransactionRepositoryInterface $detailtransactionRepository) 
    {
        $this->detailTransactionRepository = $detailtransactionRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->detailTransactionRepository->getAllDetailTransactions()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $request->is_delete = 0;
        $detailTransactionDetails = $request->only([
            'transaction_id',
            'product_id',
            'qty',
            'total_price',
            'total_discount',
            'status',
            'is_delete'
        ]);

        return response()->json(
            [
                'data' => $this->detailTransactionRepository->createTransaction($transactionDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $transactionId = $request->route('id');

        return response()->json([
            'data' => $this->transactionRepository->getTransactionById($transactionId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $memberId = $request->route('id');
        $transactionDetails = $request->only([
            'no_transaction',
            'memeber_id',
            'description',
            'total_price',
            'total_discount',
            'final_price',
            'status',
            'is_delete'
        ]);

        return response()->json([
            'data' => $this->transactionRepository->updateTransaction($transactionId, $transactionDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $transactionId = $request->route('id');
        $this->transactionRepository->deleteTransaction($transactionId);
        $this->detailTransactionRepository->deleteDetailTransaction($transactionId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}