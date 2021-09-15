<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
            'title'   => ['sometimes', 'min:5', 'max:255'],
            'content' => ['sometimes', 'min:5', 'max:5000'],
            'image'   => ['sometimes', 'image']
        ];
    }
}
