<?php

namespace JePaFe\Profile\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Profile extends FormRequest
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
            'name' => 'required|string|min:3|max:255|unique:users,name,' . $this->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->id,
            'password' => 'required|string|min:8',
        ];

        if (!is_null($this->new_password)) {
            $rules['new_password'] = 'required|string|min:8|different:password|confirmed';
        }

        return $rules;
    }
}
