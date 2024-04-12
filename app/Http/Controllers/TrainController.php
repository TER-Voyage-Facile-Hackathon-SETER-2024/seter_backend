<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainRequest;
use App\Http\Requests\UpdateTrainRequest;
use App\Http\Resources\TrainResource;
use App\Models\Train;
use App\UseCase\TrainUseCase;
use App\Utils\ApiResponse;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TrainUseCase $trainUseCase)
    {
        $data = $trainUseCase->getAll();
        return ApiResponse::success(TrainResource::collection($data),'Listes des trains',201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainRequest $request,TrainUseCase $trainUseCase)
    {
        $registerData = $request->validated();
        $data = $trainUseCase->execute($registerData);
        return ApiResponse::success(new TrainResource($data), 'Train ajouté avec succés', 201);
    }
}
