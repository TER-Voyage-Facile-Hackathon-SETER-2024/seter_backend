<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoyageRequest;
use App\Http\Resources\VoyageResource;
use App\UseCase\VoyageUseCase;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;

class VoyageController extends Controller
{
   

    /**
     * liste des voyages.
     */
    public function index(VoyageUseCase $voyageUseCase)
    {
        $data = $voyageUseCase->getAll();
        return ApiResponse::success(VoyageResource::collection($data),'Listes des voyages',201);
    }

    /**
     * ajouter un nouveau voyage.
     */
    public function store(StoreVoyageRequest $request,VoyageUseCase $voyageUseCase)
    {
        $voyageData = $request->validated();
        $data = $voyageUseCase->execute($voyageData);
        return ApiResponse::success(new VoyageResource($data), 'Voyage ajouté avec succés', 201);
    }
     /**
     * obtenir le voyage d'un utilisateur.
     */

    public function byUser($id,VoyageUseCase $voyageUseCase) {
        $data = $voyageUseCase->getVoyage($id);
        return ApiResponse::success(VoyageResource::collection($data), 'Voyage d\'un utilisateur ', 201);
    }
}
