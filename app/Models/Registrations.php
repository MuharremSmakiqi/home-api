<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    use HasFactory;
    //Fillable property into the model
        protected $fillable = [
            'customer_id',
            'package_id',
            'created_at',
            'updated_at'
        ];
}
