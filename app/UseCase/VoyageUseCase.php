<?php

namespace App\UseCase;

use App\Models\Voyage;

class VoyageUseCase {
    public function execute(array $garesdata){
        return Voyage::create($garesdata);
    }

    public function getAll(){
        return Voyage::all();
    }

    public function getVoyage($id){
        return Voyage::where(['user_id'=>$id])->get();
    }
}
