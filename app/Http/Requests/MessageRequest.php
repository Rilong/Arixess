<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'subject' => 'required',
            'text' => 'required',
            'file' => 'mimes:jpeg,bmp,png,pdf'
        ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'subject.required' => 'Это поле обязательно для заполнения',
            'text.required' => 'Это поле обязательно для заполнения',
            'file.mimes' => 'Загружать можно файл типа: jpeg, bmp, png, pdf'
        ];
    }
}
