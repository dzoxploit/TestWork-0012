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
        return Member::findOrFail($memberId);
    }

    public function deleteMember($memberId) 
    {
        Member::destroy($memberId);
    }

    public function createMember(array $memberDetails) 
    {
        return Member::create($memberDetails);
    }

    public function updateMember($memberId, array $newDetails) 
    {
        return Member::whereId($memberId)->update($newDetails);
    }

    public function getFulfilledMember() 
    {
        return Member::where('status', true);
    }
}