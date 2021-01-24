<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroStoreRequest extends FormRequest
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
       $rules = [
            'title' => 'required|unique:libros,lbr_titulo',
            'student' =>'required',
            'body' =>'required',
            'lbr_imagen'=> 'mimes:jpeg,bmp,jpg,png|between:1, 6000',

        ];
        return $rules;
    }
}
