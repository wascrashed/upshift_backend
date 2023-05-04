<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullName' => ['required' , 'max:70'] ,
            'phoneNumber' => ['required'] ,
            'role' => ['required'],
            ' Cdo_id' => ['required'],
            'password' => ['required'],
            'address' => ['required']
        ];
    }
}
