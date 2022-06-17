<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class donhangResource extends JsonResource
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
            'MaDH' => $this->MaDH,
            'NgayDatHang' => $this->NgayDatHang,
            'ThanhTien' => $this->ThanhTien,
            'DiaChiGiaoHang' => $this->DiaChiGiaoHang,
            'SDT' => $this->SDT,
            'GhiChu' => $this->GhiChu,
            'MaKH' => $this->MaKH,
            'ctdhs' => ctdhResource::collection($this->ctdhs)
        ];
    }
}