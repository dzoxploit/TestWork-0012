<?php

namespace App\Repositories;

use App\Interfaces\MemberRepositoryInterface;
use App\Models\Member;

class MemberRepository implements MemberRepositoryInterface 
{
    public function getAllMembers() 
    {
        return Member::where('is_delete','=',0)->get();
    }

    public function getMemberById($memberId) 
    {
        return Member::where('is_delete','=',0)->findOrFail($memberId);
    }

    public function getMemberByName($memberName) 
    {
        return Member::where('is_delete','=',0)->where('name', 'LIKE', '%'. $memberName . '%')->get();
    }

    public function deleteMember($memberId, array $newDetails) 
    {
        Member::where('id','=',$memberId)->update($newDetails);
    }

    public function createMember(array $memberDetails) 
    {
        return Member::create($memberDetails);
    }

    public function updateMember($memberId, array $newDetails) 
    {
        return Member::where('is_delete','=',0)->whereId($memberId)->update($newDetails);
    }

    public function getFulfilledMember() 
    {
        return Member::where('status', true)->get();
    }
}