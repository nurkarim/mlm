<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
             'user_name' => 'required|unique:users|max:9|min:9',
             'referral'  =>  'required',
             'placement_name' =>  'required',
             'email'    =>  'required',
             'password' =>  'required|min:8',
        ];
    }

    public function messages()
    {
    return [
        'user_name.required' => 'Username is required',
        'referral.required'  => 'Referral  is required',
        'placement_name.required'  => 'Position  is required',
    ];
   }
}
