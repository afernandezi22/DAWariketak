<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class langile_animalia extends Model
{
    protected $table = 'langile_animalia';
    public $timestamps = false;
    protected $primaryKey = ['id_animalia', 'id_langile', 'eguna'];
    public $incrementing = false;
    protected $fillable = ['id_langile', 'id_animalia', 'eguna'];
}
