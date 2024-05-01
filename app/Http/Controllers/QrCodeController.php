<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

// cette classe gére la génération du QR code

class QrCodeController extends Controller
{
    public function generateQrCode(Request $request)
    {
        $data = [
            'destination' => $request->destination,
            'depart' => $request->depart,
            'date' => $request->date,
            'heure_arrive' => $request->heure_arrive,
            'heure_depart' => $request->heure_depart,
            'train' => $request->train,
            'prix' => $request->prix,
            'classe' => $request->classe,
            'zone' => $request->zone,
        ];

        $jsonData = json_encode($data);
        $renderer = new ImageRenderer(
            new RendererStyle(400), 
            new ImagickImageBackEnd()
        );

        //Dans cette partie nous générons le QR code
        $writer = new Writer($renderer);
        $qrCodeImage = $writer->writeString($jsonData);
        

        return response($qrCodeImage)->header('Content-Type', 'image/png');
    }
}
