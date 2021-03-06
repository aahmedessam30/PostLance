<?php

namespace App\Http\Requests\comment;

use Illuminate\Foundation\Http\FormRequest;

class EditCommentRequest extends FormRequest
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
            'name'    => ['required', 'string', 'min:10', 'max:255'],
            'content' => ['sometimes', 'string', 'min:10', 'max:5000'],
            'post_id' => ['required'],
            'image'   => ['sometimes', 'image']
        ];
    }
}
