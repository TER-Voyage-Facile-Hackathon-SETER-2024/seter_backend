<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoyageRequest;
use App\Http\Resources\VoyageResource;
use App\UseCase\VoyageUseCase;
use App\Utils\ApiResponse;
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

    /**
     * Display a listing of the resource.
     */
    public function index(VoyageUseCase $voyageUseCase)
    {
        $data = $voyageUseCase->getAll();
        return ApiResponse::success(VoyageResource::collection($data),'Listes des voyages',201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoyageRequest $request,VoyageUseCase $voyageUseCase)
    {
        $registerData = $request->validated();
        $data = $voyageUseCase->execute($registerData);
        return ApiResponse::success(new VoyageResource($data), 'Voyage ajouté avec succés', 201);
    }

    public function byUser($id,VoyageUseCase $voyageUseCase) {
        $data = $voyageUseCase->getVoyage($id);
        return ApiResponse::success(VoyageResource::collection($data), 'Voyage d\'un utilisateur ', 201);
    }
}
