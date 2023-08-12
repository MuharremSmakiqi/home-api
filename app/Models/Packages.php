<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
     //Fillable property into the model
        protected $fillable = [
            'name',
            'description',
            'price',
            'created_at',
            'updated_at'
        ];
}
