<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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
            'title' => ['required', 'string', 'max:30'],
            'content' => ['required', 'min:10'],
            'category' => ['required'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Tytuł postu jest wymagany!',
            'title.max' => 'Tytuł postu jest za długi!',
            'content.required' => 'Treść postu jest wymagana!',
            'content.min' => 'Treść postu jest za krótka!',
            'category.required' => 'Kategoria jest wymagana!',
        ];
    }
}
