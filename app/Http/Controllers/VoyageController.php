<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoyageController extends Controller
{
    public function scanQRCode(Request $request)
    {
        $qrCodeData = $request->file('qr_code_data');

        return response()->json([
            'success' => true,
            'data' => $qrCodeData
        ]);
    }
}
