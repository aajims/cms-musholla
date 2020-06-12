<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    public $primaryKey = 'id';
    protected $casts = ['id'=>'string'];
}
