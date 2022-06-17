<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dmc extends Model
{
    use HasFactory;
    protected $table = 'danhmuccon';
    protected $primaryKey = 'MaDM';
    public $timestamps = false;

    public function dml(){
        return $this->belongsTo(dml::class,'MaDM');
    }
}
