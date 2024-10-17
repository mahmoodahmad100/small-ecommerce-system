<?php

namespace Core\Sale\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
                    'items'              => 'array|required',
                    'items.*.product_id' => 'integer|required',
                    'items.*.quantity'   => 'integer|required',
                ];
            }
            case 'PUT': {
                return [
                    'items'              => 'array|required',
                    'items.*.product_id' => 'integer|nullable',
                    'items.*.quantity'   => 'integer|nullable',
                ];
            }
        }
    }
}
