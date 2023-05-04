<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function saveFile($file)
    {
        $name = $file->getClientOriginalName();
        $path = $file->store('public/files');
        $this->name = $name;
        $this->path = $path;
        $this->save();
    }
    protected $fillable = [
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
         'resources'];

}
