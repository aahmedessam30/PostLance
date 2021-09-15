<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'string', 'min:8'],
            'country_id' => ['required', 'numeric'],
            'age'        => ['required', 'numeric'],
            'gender'     => ['required', 'string'],
            'address'    => ['required', 'string'],
            'phone'      => ['required', 'string'],
            'image'      => ['required', 'image'],
        ];
    }
}
