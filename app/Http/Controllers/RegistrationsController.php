<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request; 
use App\Services\RegistrationService;

class RegistrationsController extends Controller
{
    protected $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function register(Request $request, $id)
    {
        $result = $this->registrationService->register($request->customer_id, $id);

        if (!$result['success']) {
            return response()->json(['error' => $result['error']], 400);
        }

        return response()->json(['message' => $result['message']], 201);
    }
}
