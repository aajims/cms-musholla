<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;
	protected $fillable = [
		'role_name', 'created_at', 'updated_at'
    ];
    
    public function getUserObject()
    {
        return $this->belongsToMany(User::class)->using(UserRole::class);
    }
}
