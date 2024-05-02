<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbonnementRequest;
use App\Http\Requests\UpdateAbonnementRequest;
use App\Http\Resources\AbonnementResource;
use App\Models\Abonnement;
use App\UseCase\AbonnementUseCase;
use App\UseCase\RegisterUseCase;
use App\Utils\ApiResponse;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AbonnementUseCase $abonnementUseCase)
    {
        $data = $abonnementUseCase->getAll();
        return ApiResponse::success(AbonnementResource::collection($data),'Listes des abonnements',201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbonnementRequest $request,AbonnementUseCase $abonnementUseCase, RegisterUseCase $registerUseCase)
    {
        //
        try {
            $abonnementData = $request->validated();
            $data = $abonnementUseCase->execute($abonnementData);
            $registerUseCase->isAbonnement($request->user_id);
            return ApiResponse::success(new AbonnementResource($data), 'Abonnement ajouté avec succés', 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function byUser($id,AbonnementUseCase $abonnementUseCase) {
        $data = $abonnementUseCase->getAbonnement($id);
        return ApiResponse::success(AbonnementResource::collection($data), 'Abonnement d\'un utilisateur ', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Abonnement $abonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abonnement $abonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbonnementRequest $request, Abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abonnement $abonnement)
    {
        //
    }
}
