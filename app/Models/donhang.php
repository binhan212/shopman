<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $table = 'donhang';
    protected $primaryKey = 'MaDH';
    public $timestamps = false;
    public function ctdhs(){
        return $this->hasMany(ctdh::class, 'MaDH', 'MaDH');
    }
}
