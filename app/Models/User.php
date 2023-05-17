<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Cdo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'fullName',
        'phoneNumber',
        'cdo_id',
        'partner_id',
        'role',
        'password',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function cdo()
    {
        return $this->belongsTo(Cdo::class);
    }
    public function project()
    {
            return $this->belongsTo(Project::class);
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }


}
