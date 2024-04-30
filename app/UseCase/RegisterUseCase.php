<?php

namespace App\UseCase;

use App\Models\User;

class RegisterUseCase {
    public function execute(array $usersdata){
        return User::create($usersdata);
    }

    public function updateUser($usersdata){
        return User::where(['id'=>$usersdata->id])->update(['fullname'=>$usersdata->fullname,'adress'=>$usersdata->adress,'phone'=>$usersdata->phone,'isSubscribe'=>$usersdata->isSubscribe,'otp'=>$usersdata->otp]);
    }

    public function getUser($id){
        return User::find($id);
    }

}
