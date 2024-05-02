<?php

namespace App\UseCase;

use App\Models\Voyage;

class VoyageUseCase {
    public function execute(array $voyagesdata){
        return Voyage::create($voyagesdata);
    }

    public function getAll(){
        return Voyage::all();
    }

    public function getVoyage($id){
        return Voyage::where(['user_id'=>$id])->get();
    }
}
