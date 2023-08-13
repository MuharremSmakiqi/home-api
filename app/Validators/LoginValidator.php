<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class LoginValidator
{
    public static function validate(array $data)
    {
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return $validator;
    }
}
