<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "fullname" => $this->fullname,
            "adress" => $this->adress,
            "phone" => $this->phone,
            "cgu" => $this->cgu,
            "isSubscribe" => $this->isSubscribe
        ];
    }
}
