<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonRecordResource extends JsonResource
{
    public function toArray($request): array {
    return [
    'id' => $this->id,
    'name' => $this->name,
    'base_experience' => $this->base_experience,
    'weight' => $this->weight,
    'image_url' => $this->image_url,
    ];
  }
}
