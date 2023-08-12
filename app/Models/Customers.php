<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model 
{
    use HasFactory;
    use HasApiTokens; 
    //Fillable property into the model
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'phone',
        'address',
        'password',
        'created_at',
        'updated_at'
    ];
}
