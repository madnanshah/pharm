<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'second_id',
        'name',
        'address',
        'phone',
        'phone_2',
        'phone_3'
    ];
}
