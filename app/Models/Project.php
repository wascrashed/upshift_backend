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
        'mentor' ,
        'partner' ,
        'qttOfBoys',
        'qttOfGirls',
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
}
