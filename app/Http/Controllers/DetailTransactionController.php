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
                'data' => $this->detailTransactionRepository->createTransaction($detailTransactionDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $detailTransactionId = $request->route('id');

        return response()->json([
            'data' => $this->detailTransactionRepository->getDetailTransactionById($detailTransactionId)
        ]);
    }

    public function showByTransactionId(Request $request): JsonResponse 
    {
        $transactionId = $request->route('id');

        return response()->json([
            'data' => $this->detailTransactionRepository->getDetailTransactionByTransactionId($transactionId)
        ]);
    }


    public function update(Request $request): JsonResponse 
    {
        $detailTransactionId = $request->route('id');
        $detailTransactionDetails = $request->only([
            'product_id',
            'qty',
            'total_price',
            'total_discount',
            'status',
            'is_delete'
        ]);

        return response()->json([
            'data' => $this->detailTransactionRepository->updateTransaction($detailTransactionId, $detailTransactionDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $detailTransactionId = $request->route('id');
        $this->detailTransactionRepository->deleteDetailTransaction2($detailTransactionId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}