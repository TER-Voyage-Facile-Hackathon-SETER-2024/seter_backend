<?php

namespace App\UseCase;

use App\Models\Train;

class TrainUseCase {
    public function execute(array $trainsdata){
        return Train::create($trainsdata);
    }

    public function getAll(){
        return Train::all();
    }
}
