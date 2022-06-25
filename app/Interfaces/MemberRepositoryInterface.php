<?php

namespace App\Interfaces;

interface MemberRepositoryInterface 
{
    public function getAllMembers();
    public function getMemberById($memberId);
    public function deleteMember($memberId);
    public function createMember(array $memberDetails);
    public function updateMember($memberId, array $newDetails);
    public function getFulfilledMember();
}