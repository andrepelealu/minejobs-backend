<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordPerusahaanController extends Controller
{

    use SendsPasswordResetEmails;
    // Params : email
    protected function broker()
    {
        return Password::broker('perusahaan');
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response(['message'=> $response]);

    }


    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response(['error'=> $response], 422);

    }


}
