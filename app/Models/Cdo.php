<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Cdo extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location' , 'address' , 'status'];


public function users()
{
    return $this->hasMany(User::class);
}
}
