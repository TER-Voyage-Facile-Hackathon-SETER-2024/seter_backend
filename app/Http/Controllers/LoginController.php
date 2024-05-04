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

    /**
     * methode deconnexion d'un utilisateur.
     */
    

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
            return response()->json(['message' => 'Logged out successfully'], 200);
        } else {
            return response()->json(['message' => 'No user is currently authenticated'], 401);
        }
    }

    /**
     * methode pour l'inscription d'un utilisateur.
     */
    
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
        $data = $registerUseCase->execute($registerData);
        $formatterData = new RegisterResource($data);
        return ApiResponse::success($formatterData, 'utilisateur inscrit avec succés ', 201);
    }

    /**
     * methode pour modifier les infos d'un utilisateur.
     */
    

    public function update(UpdateUserRequest $request,RegisterUseCase $registerUseCase)
    {
        $registerData = $request->validated();
        $data = $registerUseCase->updateUser($request);
        $formatterData = new RegisterResource(User::find($request['id']));
        return ApiResponse::success($formatterData, 'utilisateur modifié avec succés ', 201);
    }
     /**
     * @param string $id l'id de l'utilisateur .
     */

    /**
     * methode pour recuperer un utilisateur.
     */
    
    public function getUser($id,RegisterUseCase $registerUseCase) {
        $user = $registerUseCase->getUser($id);
        if($user) {
            $formatterData = new RegisterResource($user);
            return ApiResponse::success($formatterData, 'utilisateur trouvé avec succés ', 200);
        } else {
            return ApiResponse::error(null, "Utilisateur non trouvé");
        }
    }
}
