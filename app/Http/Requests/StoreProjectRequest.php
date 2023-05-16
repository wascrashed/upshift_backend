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
        'mentor' => 'required|integer',
        'partner' => 'required|integer',
        'qttOfBoys' => 'required|integer',
        'qttOfGirls' => 'required|integer',
        'startDate' => 'required|dateTime',
        'finishDate' => 'required|dateTime',
        'problemBackground' => 'required|text',
        'problemDescription' => 'required|text',
        'problemSolution' => 'required|text',
        'problemInnovation' => 'required|text',
        'equipmentPrice' => 'required|integer|min:0',
        'transportPrice' => 'required|integer|min:0',
        'servicesPrice' => 'required|integer|min:0',
        'rentPrice' => 'required|integer|min:0',
        'rawPrice' => 'required|integer|min:0',
        'otherPrice' => 'required|integer|min:0',
        'resources' => 'required|text',
        'photo' => 'nullable|image',
        'files.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10000',
    ];
}
}
