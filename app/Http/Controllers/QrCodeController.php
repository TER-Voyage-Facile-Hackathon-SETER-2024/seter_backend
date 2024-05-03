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
     /**
     * cette classe gére la génération du QR code.
     */
    public function generateQrCode(Request $request)
    {
        $data = [
            "code_produit" => $request->code_produit,
            "nom_commercial" => $request->nom_commercial,
            "limites_validite" => $request->limites_validite,
            "nombre_periodes" => $request->nombre_periodes,
            "type_periode" => $request->type_periode,
            "anti_passback" => $request->anti_passback,
            "multi_validation" => $request->multi_validation,
            "validite_course_simple" => $request->validite_course_simple,
            "voyages_totaux" => $request->voyages_totaux,
            "date_basculement" => $request->date_basculement,
            "supports" => $request->supports,
            "profils" => $request->profils,
            "prix" => $request->prix

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
