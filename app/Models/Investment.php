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
    ];

    protected $dates = [
        'release_date',
    ];
}
