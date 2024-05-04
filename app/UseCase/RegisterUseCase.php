<?php

namespace App\UseCase;

use App\Models\User;

class RegisterUseCase {
    public function execute(array $usersdata){
        return User::create($usersdata);
    }

    public function updateUser($usersdata){
        return User::where(['id'=>$usersdata->id])->update(['fullname'=>$usersdata->fullname,'adress'=>$usersdata->adress,'phone'=>$usersdata->phone]);
    }

    public function getUser($id){
        return User::find($id);
    }

    public function isAbonnement($id){
        return User::where(['id'=>$id])->update(['isSubscribe'=>'1']);
    }
}
