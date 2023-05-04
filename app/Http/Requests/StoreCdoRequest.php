<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCdoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required' , 'max:70'],
            'location'=> ['required'],
            'address'=> ['required'],
            'status'=> ['required']
        ];
    }
}
