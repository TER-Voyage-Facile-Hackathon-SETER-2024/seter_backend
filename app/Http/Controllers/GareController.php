<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGareRequest;
use App\Http\Requests\UpdateGareRequest;
use App\Http\Resources\GareResource;
use App\Models\Gare;
use App\UseCase\GareUseCase;
use App\Utils\ApiResponse;

class GareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GareUseCase $gareUseCase)
    {
        $data = $gareUseCase->getAll();
        return ApiResponse::success(GareResource::collection($data),'Listes des gares',201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGareRequest $request,GareUseCase $gareUseCase)
    {
        $registerData = $request->validated();
        $data = $gareUseCase->execute($registerData);
        return ApiResponse::success(new GareResource($data), 'Gare ajoutée avec succés ', 201);
    }
}
