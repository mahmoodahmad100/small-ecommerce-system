<?php

namespace Core\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
