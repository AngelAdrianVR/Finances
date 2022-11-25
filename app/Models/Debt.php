<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'lender',
        'reason',
        'pay_date',
        'payed_at',
    ];

    protected $dates = [
        'payed_at',
        'pay_date',
    ];
}
