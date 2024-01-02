<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animalia extends Model
{
    protected $table = 'animaliak';
    public $timestamps = false;
    protected $fillable = ['izena', 'izen_zientifikoa', 'pisua', 'tamaina'];
}
