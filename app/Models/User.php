<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $table = 'users';
    public $primaryKey = 'id';
}
