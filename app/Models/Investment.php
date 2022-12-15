<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'type',
        'profit',
        'platform',
        'release_date',
        'released_at',
        'user_id',
    ];

    protected $dates = [
        'release_date',
        'released_at',
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
            $query->where('type', 'LIKE', "%$search%")
                  ->orWhere('quantity', 'LIKE', "%$search%")
                  ->orWhere('profit', 'LIKE', "%$search%")
                  ->orWhere('platform', 'LIKE', "%$search%")
                  ->orWhere('created_at', 'LIKE', "%$search%");
        });
    }
}
