<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class PassengerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'given_name' => 'required|string|max:100|min:2',
            'surname' => 'required|string|max:100|min:2',
            'email' => 'required|string|email|max:100|min:2',
            'mobile' => 'required|string|max:12|min:10',
            'passport' => 'required|string|max:50|min:5',
            'birth_date' => 'required|date',
            'status' => 'required|in:0,1'
        ];
    }
}
