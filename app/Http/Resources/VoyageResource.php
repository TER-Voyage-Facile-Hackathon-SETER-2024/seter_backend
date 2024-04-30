<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoyageResource extends JsonResource
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
            "depart"=> $this->depart,
            "destination"=> $this->destination,
            "zone"=> $this->zone,
            "prix"=> $this->prix,
            "classe"=> $this->classe,
            "date"=> $this->date,
            "train_id"=> new TrainResource($this->train),
            "user_id"=> new RegisterResource($this->user),
        ];
    }
}
