<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $primaryKey = 'MaSP';
    public $timestamps = false;
    public function mausacs(){
        return $this->hasMany(mausac::class, 'MaSP', 'MaSP');
    }
}
