<?php

namespace App\UseCase;

use App\Models\Gare;

class GareUseCase {
    public function execute(array $garesdata){
        return Gare::create($garesdata);
    }

    public function getAll(){
        return Gare::all();
    }
}
