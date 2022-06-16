<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            "id" => $this->id,
            "user_id" =>new UserResource($this->user),
            "recipients_name" => $this->recipients_name,
            "telp" => $this->telp,
            "address_label" => $this->address_label,
            "city" => $this->city,
            "postal_code" => $this->postal_code,
            "complete_address" => $this->complete_address,
            "note_for_courier" => $this->note_for_courier,
        ];
    }
}