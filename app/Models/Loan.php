<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'debtor',
        'payed_at',
        'pay_date',
           
    ];

    protected $dates = [
        'payed_at',
        'pay_date',
    ];
}
