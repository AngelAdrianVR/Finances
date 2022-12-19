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
        'reason',
        'payed_at',
        'pay_date',
        'user_id',
           
    ];

    protected $dates = [
        'payed_at',
        'pay_date',
    ];

    //relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
