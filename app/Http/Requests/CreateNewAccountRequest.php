<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateNewAccountRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required', $this->_uniqueEmail()],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name.',
            'email.required' => 'Email is required.',
//            'email.unique' => 'Email is required.',
            'password.required' => 'Please enter a password',
        ];
    }

    private function _uniqueEmail()
    {
        return Rule::unique('users', 'email');
    }

}
