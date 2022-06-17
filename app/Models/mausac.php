<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mausac extends Model
{
    use HasFactory;
    protected $table = 'mausac';
    protected $primaryKey = 'MaMS';
    public $timestamps = false;
    public function sizes(){
        return $this->hasMany(size::class, 'MaMS', 'MaMS');
    }
    public function sanpham() {
        return $this->belongsTo(sanpham::class, 'MaSP', 'MaSP');
    }
}
