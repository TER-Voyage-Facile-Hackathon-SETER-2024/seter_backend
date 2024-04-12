<?php

namespace App\UseCase;

use App\Models\User;

class RegisterUseCase {
    public function execute(array $usersdata){
        return User::create($usersdata);
    }

}
