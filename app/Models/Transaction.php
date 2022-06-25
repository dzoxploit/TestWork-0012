<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaction;
use App\Models\Member;

class Transaction extends Model
{
    use HasFactory;

    public function detailTransactions()
    {
        return $this->hasMany(DetailTransactions::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
