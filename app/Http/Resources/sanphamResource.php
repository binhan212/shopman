<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class sanphamResource extends JsonResource
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
            'MaSP' => $this->MaSP,
            'TenSP' => $this->TenSP,
            'MoTa' => $this->MoTa,
            'GiamGia' => $this->GiamGia,
            'MaDMC' => $this->MaDMC,
            'mausacs' => mausacResource::collection($this->mausacs)
        ];
    }
}
