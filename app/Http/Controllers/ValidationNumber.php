<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeOtpRequest;
use App\Http\Requests\ValidateOtpRequest;
use App\Models\User;
use App\Service\OtpService;
use App\Utils\ApiResponse;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class ValidationNumber extends Controller
{
    private $otpGenerated;

    public function getCodeAuto(CodeOtpRequest $request)
    {
        $otp = OtpService::generateOtp();
        $phoneSaisit = User::where("phone", $request["phone"])->first();
        if ($phoneSaisit == null) {
            return ApiResponse::error($otp, "aucun compte seter associé", 400);
        }

        return ApiResponse::success([], "il existe un compte seter associé", 200);
    }


    public function verifyOtp(ValidateOtpRequest $request)
    {
        $oldOtp = $request->oldOtp;
        $newOtp = $request->newOtp;
      
        if ($oldOtp === $newOtp) {
            return ApiResponse::success([], "Le code OTP est correct. Authentification réussie.", 200);
        } else {
            return ApiResponse::error([], "Le code OTP est incorrect.", 400);
        }
    }
}
