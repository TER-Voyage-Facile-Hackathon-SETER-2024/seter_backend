<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\RegisterResource;
use App\Models\User;
use App\UseCase\RegisterUseCase;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
            return response()->json(['message' => 'Logged out successfully'], 200);
        } else {
            return response()->json(['message' => 'No user is currently authenticated'], 401);
        }
    }
    public function register(RegisterRequest $request, RegisterUseCase $registerUseCase)
    {
        $registerData = $request->validated();
        $user = $registerUseCase->execute($registerData);
        if ($user) {
            auth()->login($user);

            $token = $user->createToken('API_Token')->plainTextToken;

            $formatterData = new RegisterResource($user);
            $response = ApiResponse::success($formatterData, 'utilisateur inscrit avec succés ', 201, $token);
            $response->header('Authorization', 'Bearer ' . $token);
            return $response;
        } else {
            return ApiResponse::error(null, "An error occure while trying to create a user");
        }
    }
}
