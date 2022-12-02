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

     // query scopes
     public function scopeFilter($query, $filters)
     {
         $query->when($filters["search"] ?? null, function($query, $search){
             $query->where('debtor', 'LIKE', "%$search%")
                   ->orWhere('quantity', 'LIKE', "%$search%")
                   ->orWhere('created_at', 'LIKE', "%$search%");
         });
     }
}
