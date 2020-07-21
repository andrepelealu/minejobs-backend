<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordKandidatController extends Controller
{

    use ResetsPasswords;

    // params : token, email, password, password_confirmation
    protected function sendResetResponse(Request $request, $response)
    {
        return response(['message'=> trans($response)]);

    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response(['error'=> trans($response)], 422);
    }
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function broker()
    {
        return Password::broker('kandidat');
    }
    protected function guard()
    {
        return Auth::guard('kandidat');
    }
}