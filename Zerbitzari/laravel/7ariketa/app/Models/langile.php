<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class langile extends Model
{
    protected $table = 'langileak';
    public $timestamps = false;
    protected $fillable = ['izena', 'abizena1', 'abizena2'];
}
