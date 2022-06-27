<?php

namespace App\Http\Controllers;

use App\Interfaces\MemberRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberController extends Controller 
{
    private MemberRepositoryInterface $memberRepository;

    public function __construct(MemberRepositoryInterface $memberRepository) 
    {
        $this->memberRepository = $memberRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->memberRepository->getAllMembers()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $request->no_member = IdGenerator::generate(['table' => 'members', 'length' => 10, 'prefix' =>'M-']);
        $request->is_delete = 0;
        $memberDetails = $request->only([
            'no_member',
            'name',
            'address',
            'phone_number',
            'status',
            'is_delete'
        ]);

        return response()->json(
            [
                'data' => $this->memberRepository->createMember($memberDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $memberId = $request->route('id');

        return response()->json([
            'data' => $this->memberRepository->getMemberById($memberId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $memberId = $request->route('id');
         $memberDetails = $request->only([
            'name',
            'address',
            'phone_number',
            'status',
        ]);

        return response()->json([
            'data' => $this->memberRepository->updateMember($memberId, $memberDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $memberId = $request->route('id');
        $this->memberRepository->deleteMember($memberId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}