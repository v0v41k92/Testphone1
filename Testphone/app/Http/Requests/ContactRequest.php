<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
          'name'=>'required',
          'number'=>'required|min:11|numeric',
          'email'=>'sometimes|email'
        ];
    }
    public function attributes(){
      return[
        'name'=>'Имя'
      ];}
    public function messages(){
      return[
        'name.required'=>'Поле имя является обязательным'
      ];
    }
}
