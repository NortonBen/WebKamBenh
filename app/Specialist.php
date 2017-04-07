<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected  $table = 'specialists';
    protected $fillable = ['name'];
}
