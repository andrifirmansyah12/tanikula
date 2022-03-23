<?php

namespace App\Http\Resources\Gapoktan;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
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
            "user_id" => $this->user_id,
            "category_education_id" => $this->category_education_id,
            "title" => $this->title,
            "slug" => $this->slug,
            "date" => $this->date,
            "file" => $this->file,
            "desc" =>  $this->desc,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
