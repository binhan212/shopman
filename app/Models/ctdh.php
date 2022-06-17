<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctdh extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    protected $primaryKey = 'MaCTDH';
    public $timestamps = false;
    public function donhang() {
        return $this->belongsTo(donhang::class, 'MaDH', 'MaDH');
    }
}
