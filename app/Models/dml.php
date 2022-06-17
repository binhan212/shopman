<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dml extends Model
{
    use HasFactory;
    protected $table = 'danhmuclon';
    protected $primaryKey = 'MaDM';
    public $timestamps = false;
}
