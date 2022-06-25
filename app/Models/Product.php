<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTransaction;

class Product extends Model
{
    use HasFactory;

    public function detailTransaction()
    {
        return $this->hasOne(DetailTransaction::class);
    }
}
