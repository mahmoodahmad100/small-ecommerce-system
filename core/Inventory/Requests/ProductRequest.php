<?php

namespace Core\Inventory\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'name'        => strip_tags($this->name),
            'description' => strip_tags($this->description),
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'category_id' => 'integer|required',
                    'name'        => 'string|required',
                    'description' => 'string|nullable',
                    'price'       => 'decimal:2,4|required',
                    'quantity'    => 'integer|required'
                ];
            }
            case 'PUT': {
                return [
                    'category_id' => 'integer|nullable',
                    'name'        => 'string|nullable',
                    'description' => 'string|nullable',
                    'price'       => 'decimal:2,4|nullable',
                    'quantity'    => 'integer|nullable'
                ];
            }
        }
    }
}
