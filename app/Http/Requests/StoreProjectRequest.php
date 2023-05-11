<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    public function rules()
    {
        return [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title'=> 'required',
            'location'=> 'required',
            'status'=> 'required' ,
            'mentor'=> 'required' ,
            'partner'=> 'required' ,
            'qttOfBoys'=> 'required',
            'qttOfGirls'=> 'required',
            'startDate'=> 'required',
            'finishDate'=> 'required' ,
            'problemBackground'=> 'required',
            'problemDescription'=> 'required',
            'problemSolution'=> 'required',
            'problemInnovation'=> 'required',
            'equipmentPrice'=> 'required',
            'transportPrice'=> 'required',
            'servicesPrice'=> 'required',
            'rentPrice' => 'required',
            'rawPrice' => 'required',
            'otherPrice'=> 'required',
            'resources'=> 'required'
        ];
    }
}
