<?php

namespace App\Service;

class OtpService
{
    public static function generateOtp()
    {
        $otp = mt_rand(100000, 999999);
        return (string) $otp;
    }
    
}
