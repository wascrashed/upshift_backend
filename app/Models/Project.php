<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use HasFactory;
    protected $table = 'projects';

    protected $fillable = [
        'imagePath',
        'title',
        'location' ,
        'status' ,
        'user_id' ,
        'partner_id' ,
        'startDate',
        'finishDate',
        'problemBackground',
        'problemDescription',
        'problemSolution',
        'problemInnovation',
        'equipmentPrice',
        'transportPrice',
        'servicesPrice',
        'rentPrice' ,
        'rawPrice' ,
        'otherPrice',
        'resources'
    ];
    public function files()
{
    return $this->hasMany(Files::class);
}
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }
}
