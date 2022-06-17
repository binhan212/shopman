<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $primaryKey = 'MaSize';
    public $timestamps = false;
    public function mausac() {
        return $this->belongsTo(mausac::class, 'MaMS', 'MaMS');
    }
}
