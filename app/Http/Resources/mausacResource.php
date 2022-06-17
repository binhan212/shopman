<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class mausacResource extends JsonResource
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
            'MaMS' => $this->MaMS,
            'TenMS' => $this->TenMS,
            'AnhMS' => $this->AnhMS,
            'MaSP' => $this->MaSP,
            'Gia' => $this->Gia,
            'sizes' =>sizeResource::collection($this->sizes)
        ];;
    }
}
