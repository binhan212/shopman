<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ctdhResource extends JsonResource
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
            'MaCTDH' => $this->MaCTDH,
            'MaSize' => $this->MaSize,
            'GiamGia' => $this->GiamGia,
            'SoLuong' => $this->SoLuong,
            'MaDH' => $this->MaDH
        ];
    }
}
