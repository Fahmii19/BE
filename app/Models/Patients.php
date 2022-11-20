<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Patients extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'status',
        'in_date_at',
        'out_date_at'
    ];
}
