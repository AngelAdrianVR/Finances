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

    // query scopes
    public function scopeFilter($query, $filters)
    {
        $query->when($filters["search"] ?? null, function($query, $search){
            $query->where('lender', 'LIKE', "%$search%")
                  ->orWhere('quantity', 'LIKE', "%$search%")
                  ->orWhere('reason', 'LIKE', "%$search%")
                  ->orWhere('created_at', 'LIKE', "%$search%");
        });
    }
}
