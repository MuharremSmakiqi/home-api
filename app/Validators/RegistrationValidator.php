<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class RegistrationValidator
{
    public static function validate(array $data)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers', 
            'password' => 'required|min:6',
        ]);

        return $validator;
    }
}
