<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
      
           
                'name'=>'required|min:5|max:20',
                'email'=>'required|string|email|unique:users,email',
                'password'=>'required|min:6',
                'role'=>'required|exists:roles,id',
                'shop'=>'required|exists:shops,id'
      
                          
        ];
    }
    public function attributes(){
        return[
            'name'=>'user name'
        ];

    }
    public function messages(){
       return [
        'name.required'=>'Username required'
       ];
    }
}
