<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ttdh extends Model
{
    use HasFactory;
    protected $table = 'trangthaidonhang';
    protected $primaryKey = 'MaTT';
    public $timestamps = false;
}
