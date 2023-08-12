<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrations extends Model
{
    use HasFactory;
    //Fillable property into the model
        protected $fillable = [
            'uuid',  
            'customer_id',
            'package_id',
            'created_at' 
        ];
    public $timestamps = false;
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
}
