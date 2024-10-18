<?php

namespace Core\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'email'    => strip_tags($this->email),
            'password' => strip_tags($this->password),
        ]);
    }

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

        if (request()->route()->getName() == 'api.v1.auth.login') {
            return [
                'email'    => 'required|email',
                'password' => 'required|string'
            ];
        }

        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name'     => 'required|string',
                    'email'    => 'required|email|unique:users',
                    'password' => 'required|string'
                ];
            }
            case 'PUT': {
                return [
                    'name'     => 'nullable|string',
                    'email'    => 'nullable|email',
                    'password' => 'nullable|string'
                ];
            }
        }
    }
}
