<?php

namespace App\UseCase;

use App\Models\Abonnement;

class AbonnementUseCase {
    public function execute(array $garesdata){
        return Abonnement::create($garesdata);
    }

    public function getAll(){
        return Abonnement::all();
    }

    public function getAbonnement($id){
        return Abonnement::where(['user_id'=>$id])->get();
    }

}
