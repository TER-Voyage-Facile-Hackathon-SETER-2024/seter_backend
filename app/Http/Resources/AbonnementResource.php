<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AbonnementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id"=> $this->id,
            "numero_carte"=> $this->numero_carte,
            "zone"=> $this->zone,
            "montant"=> $this->montant,
            "classe"=> $this->classe,
            "date_validite"=> $this->date_validite,
            "duree"=> $this->duree,
            "user_id"=> new RegisterResource($this->user),
        ];
    }
}
