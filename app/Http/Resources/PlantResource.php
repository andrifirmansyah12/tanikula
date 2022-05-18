<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'farmer_id' => new FarmerResource($this->farmer),
            'poktan_id' =>  new PoktanResource($this->poktan),
            "plant_tanaman" => $this->plant_tanaman,
            'surface_area' => $this->surface_area,
            'plating_date' => $this->plating_date,
            'harvest_date' => $this->harvest_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
