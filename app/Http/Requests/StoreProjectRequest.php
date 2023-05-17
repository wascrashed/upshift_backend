<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{

    public function rules()
{
    return [
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'user_id' => 'required|integer',
        'partner_id' => 'required|integer',
        'startDate' => 'required|date_format:Y-m-d',
        'finishDate' => 'required|date_format:Y-m-d',
        'problemBackground' => 'required|string',
        'problemDescription' => 'required|string',
        'problemSolution' => 'required|string',
        'problemInnovation' => 'required|string',
        'equipmentPrice' => 'required|integer|min:0',
        'transportPrice' => 'required|integer|min:0',
        'servicesPrice' => 'required|integer|min:0',
        'rentPrice' => 'required|integer|min:0',
        'rawPrice' => 'required|integer|min:0',
        'otherPrice' => 'required|integer|min:0',
        'resources' => 'required|string',
        'photo' => 'nullable|image',
        'files.*' => 'nullable|file|mimes:pdf,doc,docx,txt,xls,xlsx,ppt,pptx|max:10000', ];
}
}
