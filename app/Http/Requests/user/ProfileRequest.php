<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'       => ['string', 'max:255'],
            'email'      => ['string', 'email', 'max:255'],
            'password'   => ['string', 'min:8'],
            'country_id' => ['required'],
            'age'        => ['numeric'],
            'gender'     => ['required', 'string'],
            'address'    => ['string'],
            'phone'      => ['string'],
            'image'      => ['image'],
        ];
    }
}
